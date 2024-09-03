<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa as S;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
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
        
        if (request()->ajax()) {
            $siswa = S::select('id', 'nama', 'nis', 'alamat');
            return DataTables::of($siswa)
                ->addIndexColumn()
                ->addColumn('action', function ($siswa) {
                    $btn = '<button onclick="openEditModal('.$siswa->id.', \''.$siswa->nama.'\', \''.$siswa->nis.'\', \''.$siswa->alamat.'\')" class="edit btn btn-info btn-sm">Edit</button>';
                    $btn .= '<a href="javascript:void(0)" onclick="confirmDelete(' . $siswa->id . ')" class="delete btn btn-danger btn-sm ms-2">Delete</a>';
                    $btn .= '<form id="delete-form-' . $siswa->id . '" action="' . route('siswa.destroy', $siswa->id) . '" method="POST" style="display: none;">
                                        ' . csrf_field() . '
                                        ' . method_field('DELETE') . '
                                     </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
                return response()->json(['success' => true, 'message' => "Data siswa berhasil diimpor!"]);
            } catch (\Exception $e) {
                Log::error('Import error: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan saat mengimpor data    !' . $e->getMessage()], 500);
            }
        }

        $mode = $request->input('mode');
        
            $result = match ($mode) {
                'ADD' => S::add(
                    $request->input('nama'),
                    $request->input('nis'),
                    $request->input('alamat')
                ),
                'UPDATE' => S::updateData(
                    $request->input('id'),
                    $request->input('nama'),
                    $request->input('nis'),
                    $request->input('alamat')
                ),
                default => throw new \InvalidArgumentException('Mode tidak valid'),
            };

            return response()->json($result);
       
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
    public function edit($id)
    {
        $siswa = S::findOrFail($id); 
        return response()->json($siswa); // Kembalikan data siswa dalam format JSON
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
        $siswa = S::find($id);
        if ($siswa) {
            $siswa->delete();
            return response()->json(['success' => 'Data berhasil dihapus.']);
        }

        return response()->json(['error' => 'Data tidak ditemukan.'], 404);
    }
}
