<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa as S;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;



class SiswaController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('export')) {
            return $this->export();
        }
        $query = S::query();

        if ($request->filled('cari') && $request->filled('kolom')) {
            $kolom = $request->input('kolom');
            $cari = $request->input('cari');
            $query->where($kolom, 'like', "%{$cari}%");
        }

        if (request()->ajax()) {
            $siswa = S::query();

            return DataTables::of($siswa)
                ->addColumn('action', function ($row) {
                    $editUrl = route('siswa.edit', $row->id);
                    $deleteUrl = route('siswa.destroy', $row->id);
                    return '
                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal" 
                            data-id="{{ $row->id }}" 
                            data-nama="{{ $row->nama }}" 
                            data-nis="{{ $row->nis }}" 
                            data-alamat="{{ $row->alamat }}">
                            Edit
                            </a>                        
                    <button class="btn btn-sm btn-danger" onclick="confirmDelete(' . $row->id . ')">Delete</button>
                    <form id="delete-form-' . $row->id . '" action="' . $deleteUrl . '" method="POST" style="display:none;">
                        ' . method_field('DELETE') . '
                        ' . csrf_field() . '
                    </form>
                ';
                })

                ->rawColumns(['action'])  // Untuk memberitahu DataTables agar tidak meng-escape kolom ini
                ->make(true);
        }
        $siswa = $query->paginate(20);

        return view('home');
    }


    private function export()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');

        Session::flash('success', 'Data siswa berhasil diekspor!');
        return redirect()->route('siswa.index'); // Ganti dengan route yang sesuai
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('create_siswa');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv',
            ]);

            try {
                $file = $request->file('file');
                $nama_file = rand() . $file->getClientOriginalName();
                $file->move(public_path('file_siswa'), $nama_file);

                Excel::import(new SiswaImport, public_path('file_siswa/' . $nama_file));
                return redirect()->route('siswa.index')->with('success', "Data siswa berhasil diimpor!");
            } catch (\Exception $e) {
                Log::error('Import error: ' . $e->getMessage());
                return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            }
        }

        if ($request->ajax()) {
            $mode = $request->input('mode');
            
            // Validasi data
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nis' => 'required|string|max:20|unique:siswa,nis,' . $request->input('id'),
                'alamat' => 'required|string',
            ]);
    
            try {
                // Operasi berdasarkan mode
                $result = match ($mode) {
                    'ADD' => S::add($request->input('nama'), $request->input('nis'), $request->input('alamat')),
                    'UPDATE' => S::updateData($request->input('id'), $request->input('nama'), $request->input('nis'), $request->input('alamat')),
                    default => throw new \Exception('Mode tidak valid'),
                };
    
                return response()->json([
                    'success' => $result['success'],
                    'message' => $result['message']
                ]);
            } catch (\Exception $e) {
                Log::error('Kesalahan saat memproses data siswa: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan internal. Silakan coba lagi nanti.'
                ], 500);
            }
        }
    
        return redirect()->route('siswa.index')->with('error', 'Permintaan tidak valid.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $siswa = S::find($id);

        return View::make('show')
            ->with('siswa', $siswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = S::findOrFail($id);
        return view('edit_siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update() {}

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        try {
            $siswa = S::findOrFail($id);
            $siswa->delete();

            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus secara permanen.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat menghapus siswa.');
        }
    }
}
