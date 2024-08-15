<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\GuruController;
//use App\Http\Controllers\DosenController;
//use App\Http\Controllers\AyoController;
//use App\Http\Controllers\ContohValidController;
//use App\Http\Controllers\WebController;
//use App\Http\Controllers\DikiController;
//use App\Http\Controllers\KaryawanController;
//use App\Http\Controllers\PenggunaController;
//use App\Http\Controllers\KiwController;
//use App\Http\Controllers\UploadController;
//use App\Http\Controllers\TesController;
//use App\Http\Controllers\NotifController;
//use App\Http\Controllers\ResourceController;
//use App\Http\Controllers\BagasngodingController;
//use App\Http\Controllers\PegawaiController;



Route::get('/', function () {
    return view('welcome');
});

//Route::resource('tanks', ResourceController::class);

//Route::get('/kirimemail', [BagasngodingController::class, 'index']);

//Route::get('/pegawai', [PegawaiController::class, 'index']);
//Route::get('/pegawai/cetak_pdf', [PegawaiController::class, 'index']);


    
//Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);

//Route::get('halo/{nama}', [App\Http\Controllers\HaloController::class, 'halo']);
//Route::get('halo', [App\Http\Controllers\HaloController::class, 'panggil']);




Route::get('siswa', [App\Http\Controllers\SiswaController::class, 'index']);
Route::get('/siswa/export_excel', [App\Http\Controllers\SiswaController::class,'export_excel']);
Route::post('/siswa/import_excel', [App\Http\Controllers\SiswaController::class,'import_excel']);
//Route::get('/siswa/hapus_permanen_semua',[App\Http\Controllers\SiswaController::class,'hapus_permanen_semua']);




//Route::get('/karyawan', [KaryawanController::class, 'karyawan_index']);
//Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah']);
//Route::post('/karyawan/store', [KaryawanController::class, 'store']);
//Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
//Route::post('/karyawan/update', [KaryawanController::class, 'update']);
//Route::get('/karyawan/hapus/{id}',[KaryawanController::class, 'hapus']);


//Route::get('/anggota', [DikiController::class, 'index']);
//Route::get('/dosen', [DosenController::class, 'index']);

//Route::get('/enkripsi', [AyoController::class, 'enkripsi']);

//Route::get('/data', [AyoController::class,'data']);
//Route::get('/data/{data_rahasia}', [AyoController::class,'data_proses']);
//Route::get('/hash', [KiwController::class,'hash']);


//Route::get('/upload', [UploadController::class,'upload']);
//Route::post('/upload/proses',[UploadController::class,'proses_upload']);
//Route::get('/upload/hapus/{id}',[UploadController::class, 'hapus']);

//Route::get('/session/tampil',[TesController::class,'tampilkan_Session']);
//Route::get('/session/buat',[TesController::class,'buat_Session']);
//Route::get('/session/hapus',[TesController::class,'hapus_Session']);

//Route::get('/pesan',[NotifController::class,'index']);
//Route::get('/pesan/sukses',[NotifController::class,'sukses']);
//Route::get('/pesan/peringatan',[NotifController::class,'peringatan']);
//Route::get('/pesan/gagal',[NotifController::class,'gagal']);

#Route::get('/article', [WebController::class, 'index']);
//Route::get('/article', [WebController::class, 'index']);


#Route::get('/guru', [GuruController::class, 'index']);
#Route::get('/guru/hapus/{id}', [GuruController::class, 'hapus']);
#Route::get('/guru/trash', [GuruController::class, 'trash']);
#Route::get('/guru/kembalikan/{id}',  [GuruController::class, 'kembalikan']);
#Route::get('/guru/kembalikan_semua', [GuruController::class, 'kembalikan_semua']);

//Route::get('/pengguna', [PenggunaController::class, 'index']);

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








