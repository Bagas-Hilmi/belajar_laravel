<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BlogController;
//use App\Http\Controllers\PegawaiController;
//use App\Http\Controllers\ContohValidController;
use App\Http\Controllers\PenggunaController;
use App\Pengguna;

Route::get('/', function () {
    return view('welcome');
});

#Route::get('/guru', [GuruController::class, 'index']);
#Route::get('/guru/hapus/{id}', [GuruController::class, 'hapus']);
#Route::get('/guru/trash', [GuruController::class, 'trash']);
#Route::get('/guru/kembalikan/{id}',  [GuruController::class, 'kembalikan']);
#Route::get('/guru/kembalikan_semua', [GuruController::class, 'kembalikan_semua']);
#Route::get('/guru/hapus_permanen_semua', [GuruController::class, 'hapus_permanen_semua']);




Route::get('/pengguna', [PenggunaController::class, 'index']);

//Route::get('halo', function () {
	//return "Halo, Selamat datang di tutorial";
//});

//Route::get('blog', function () {
	return view('blog');
//});

// route blog
//Route::get('/blog', [BlogController::class, 'home']);
//Route::get('/blog/tentang', [BlogController::class, 'tentang']);
//Route::get('/blog/kontak', [BlogController::class, 'kontak']);

//route CRUD


//Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
//Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
//Route::post('/pegawai/store', [PegawaiController::class, 'store']);
//Route::get('/pegawai/edit/{id}',[PegawaiController::class, 'edit']);
//Route::put('/pegawai/update/{id}',[PegawaiController::class, 'update']);
//Route::delete('/pegawai/hapus/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');
//Route::get('/pegawai/cari',[PegawaiController::class, 'cari']);
//Route::get('/input', [ContohValidController::class, 'input']);
//Route::post('/proses', [ContohValidController::class, 'proses']);








