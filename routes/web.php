<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('siswa', App\Http\Controllers\SiswaController::class);




