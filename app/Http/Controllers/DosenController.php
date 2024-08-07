<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        $nama = "Lionel Messi" ;

        $pelajaran = ["Algoritma & Pemrograman", "kalkulus", "pemrograman web"];

        return view('biodata',['nama' => $nama , 'matkul'=> $pelajaran]);
    }
}