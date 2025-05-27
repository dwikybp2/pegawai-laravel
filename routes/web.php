<?php

use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('pegawai.index');
});

Route::resource('provinsi', ProvinsiController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kelurahan', KelurahanController::class);
Route::resource('pegawai', PegawaiController::class);