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
use RealRashid\SweetAlert\Facades\Alert;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('export')) {
            return $this->export();
        }
    
        $query = S::query();
    
        if ($request->filled('nama')) {
            $query->where('nama', 'like', "%{$request->input('nama')}%");
        }
        if ($request->filled('nis')) {
            $query->where('nis', 'like', "%{$request->input('nis')}%");
        }
        if ($request->filled('alamat')) {
            $query->where('alamat', 'like', "%{$request->input('alamat')}%");
        }
    
        $siswa = $query->paginate(50); 
    
        return view('siswa', compact('siswa'));
    }


    private function export()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
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
                $filePath = $request->file('file')->store('imports');

                Excel::import(new SiswaImport, storage_path('app/' . $filePath));

                Alert::success('Success', 'Import successful!');

                return redirect()->route('siswa.index')->with('success', 'Import successful!');
            } catch (\Exception $e) {
                Alert::error('Error', 'Terjadi kesalahan saat mengimpor data.');

                return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat mengimpor data.');
            }
        } else {
            $mode = $request->input('mode');

            try {
                $result = match ($mode) {
                    'ADD' => S::add($request->input('nama'), $request->input('nis'), $request->input('alamat')),
                    'UPDATE' => S::updateData($request->input('id'), $request->input('nama'), $request->input('nis'), $request->input('alamat')),
                    default => throw new \Exception('Mode tidak valid'),
                };

                if ($result['success']) {
                    Alert::success('Success', $result['message']);

                    return redirect()->route('siswa.index')->with('success', $result['message']);
                } else {
                    Alert::error('Error', $result['message']);

                    return redirect()->route('siswa.index')->with('error', $result['message']);
                }
            } catch (\Exception $e) {
                Alert::error('Error', $e->getMessage());

                return redirect()->route('siswa.index')->with('error', $e->getMessage());
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