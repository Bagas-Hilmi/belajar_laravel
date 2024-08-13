<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    // menampilkan isi session
	public function tampilkan_Session(Request $request) {
		if($request->session()->has('nama')){
			echo $request->session()->get('nama');
		}else{
			echo 'Tidak ada data dalam session.';
		}
    }
    // membuat session
	public function buat_Session(Request $request) {
		$request->session()->put('nama','Diki Alfarabi Hadi');
		echo "Data telah ditambahkan ke session.";
	}
    // menghapus session
	public function hapus_Session(Request $request) {
		$request->session()->forget('nama');
		echo "Data telah dihapus dari session.";
	}
 
}
