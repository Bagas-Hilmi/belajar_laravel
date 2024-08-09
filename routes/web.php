<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ContohValidController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () {
	return "Halo, Selamat datang di tutorial";
});

Route::get('blog', function () {
	return view('blog');
});

// route blog
Route::get('/blog', [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);

//route CRUD


Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/store', [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{id}',[PegawaiController::class, 'edit']);
Route::put('/pegawai/update/{id}',[PegawaiController::class, 'update']);

Route::delete('/pegawai/hapus/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');

Route::get('/pegawai/cari',[PegawaiController::class, 'cari']);


Route::get('/input', [ContohValidController::class, 'input']);
 
Route::post('/proses', [ContohValidController::class, 'proses']);





