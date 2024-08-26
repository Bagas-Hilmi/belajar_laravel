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

        $siswa = $query->paginate(20);

        return view('siswa', compact('siswa'));
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
         $mode = $request->input('mode');
     
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
         } else {
             try {
                 $result = match ($mode) {
                     'ADD' => S::add($request->input('nama'), $request->input('nis'), $request->input('alamat')),
                     'UPDATE' => S::updateData($request->input('id'), $request->input('nama'), $request->input('nis'), $request->input('alamat')),
                     default => throw new \Exception('Mode tidak valid'),
                 };

                 if ($result['success']) {
                     return redirect()->route('siswa.index')->with('success', $result['message']);
                 } else {
                     return redirect()->route('siswa.index')->with('error', $result['message']);
                 }
             } catch (\Exception $e) {
                 return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
             }
         }
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
