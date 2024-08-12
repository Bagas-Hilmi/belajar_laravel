<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\GuruController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PegawaiController;
//use App\Http\Controllers\ContohValidController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DikiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenggunaController;


use App\Pengguna;

Route::get('/test', function () {
    return 'Routing is working!';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, 'karyawan_index']);
Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update', [KaryawanController::class, 'update']);
Route::get('/karyawan/hapus/{id}',[KaryawanController::class, 'hapus']);


Route::get('/anggota', [DikiController::class, 'index']);
//Route::get('/dosen', [DosenController::class, 'index']);




#Route::get('/article', [WebController::class, 'index']);


#Route::get('/guru', [GuruController::class, 'index']);
#Route::get('/guru/hapus/{id}', [GuruController::class, 'hapus']);
#Route::get('/guru/trash', [GuruController::class, 'trash']);
#Route::get('/guru/kembalikan/{id}',  [GuruController::class, 'kembalikan']);
#Route::get('/guru/kembalikan_semua', [GuruController::class, 'kembalikan_semua']);
#Route::get('/guru/hapus_permanen_semua', [GuruController::class, 'hapus_permanen_semua']);


Route::get('/article', [WebController::class, 'index']);


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


//Route::get('/pegawai',[PegawaiController::class, 'index']);
//Route::get('/pegawai/cari',[PegawaiController::class, 'cari']);
//Route::get('/input', [ContohValidController::class, 'input']);
//Route::post('/proses', [ContohValidController::class, 'proses']);








