<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SiswaController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa', ['siswa' => $siswa]);
    }

    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function import_excel(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // Menangkap file excel
        $file = $request->file('file');

        // Membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // Memastikan folder file_siswa ada
        if (!file_exists('file_siswa')) {
            mkdir('file_siswa', 0755, true);
        }

        // Upload ke folder file_siswa didalam folder public
        $file->move('file_siswa', $nama_file);

        // Impor data
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $nama_file));

        // Notifikasi dengan session
        Session::flash('sukses', 'Data siswa berhasil diimport!');

        // Alihkan halaman kembali
        return redirect('/siswa');
    }
    public function hapus_permanen_semua()
    {
        // hapus permanen data guru
        $siswa = Siswa::onlyTrashed();
        $siswa->forceDelete();

        return redirect('/siswa/trash');
    }
}
