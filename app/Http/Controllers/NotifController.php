<?php

namespace App\Http\Controllers;

//contoh
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function index(){
        return view('notifikasi');
    }

    public function sukses(){
        Session::flash('sukses','Ini notifikasi Sukses');
        return redirect('pesan');
    }

    public function peringatan(){
        Session::flash('peringatan','ini notifikasi Peringatan');
        return redirect('pesan');
    }

    public function gagal(){
        Session::flash('gagal','ini notifikasi Gagal');
        return redirect('pesan');
    }

}
