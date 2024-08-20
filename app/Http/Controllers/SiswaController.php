<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $siswa = Siswa::all();
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
        // Check if the request has a file for import
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv',
            ]);

            try {
                // Store the uploaded file
                $filePath = $request->file('file')->store('imports');

                // Import the file
                Excel::import(new SiswaImport, storage_path('app/' . $filePath));

                return redirect()->route('siswa.index')->with('success', 'Import successful!');
            } catch (\Exception $e) {
                return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat mengimpor data.');
            }
        } else {
            // Handle regular form submission
            $request->validate([
                'nama' => 'required|string|max:255',
                'nis' => 'required|digits_between:3,10',
                'alamat' => 'required|string',
            ]);

            // Simpan data ke database
            try {
                Siswa::create([
                    'nama' => $request->input('nama'),
                    'nis' => $request->input('nis'),
                    'alamat' => $request->input('alamat'),
                ]);

                return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
            } catch (\Exception $e) {
                return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat menyimpan data siswa.');
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $siswa = Siswa::find($id);

        return View::make('show')
            ->with('siswa', $siswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('edit_siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nis' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();  // Ini akan menghapus data secara permanen

            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus secara permanen.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat menghapus siswa.');
        }
    }
}
