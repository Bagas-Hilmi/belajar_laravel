<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class KaryawanController extends Controller
{
    public function karyawan_index()
    {
    	// mengambil data dari table karyawan
		$karyawan = DB::table('karyawan')->paginate(17);
 
        // mengirim data karyawan ke view index
        return view('index',['karyawan' => $karyawan]);
 
    }
    public function tambah()
    {
     
        // memanggil view tambah
        return view('tambah');
     
    }
    public function store(Request $request)
    {
        DB::table('karyawan')->insert([
            'karyawan_nama'=>$request->nama,
            'karyawan_jabatan'=>$request->jabatan,
            'karyawan_umur'=>$request->umur,
            'karyawan_alamat'=>$request->alamat,
        ]);
        return redirect('/karyawan');
    }
        
    public function edit($id)
    {
        $karyawan = DB::table('karyawan')->where('karyawan_id', $id)->get();
        return view('edit',['karyawan'=> $karyawan]);    
    }

    // update data karyawan
    public function update(Request $request)
    {
        // update data karyawan
        DB::table('karyawan')->where('karyawan_id',$request->id)->update([
            'karyawan_nama' => $request->nama,
            'karyawan_jabatan' => $request->jabatan,
            'karyawan_umur' => $request->umur,
            'karyawan_alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman karyawan
        return redirect('/karyawan');
    }

    public function hapus($id)
    {
        DB::table('karyawan')->where('karyawan_id',$id)->delete();
        return redirect('/karyawan');
    }

}