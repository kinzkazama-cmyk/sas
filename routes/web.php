<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/siswa'));

Route::get('/siswa', [AbsensiController::class, 'siswa']);
Route::post('/siswa', [AbsensiController::class, 'simpanSiswa']);
Route::delete('/siswa/{student}', [AbsensiController::class, 'hapusSiswa']);

Route::get('/scan', [AbsensiController::class, 'scan']);
Route::post('/scan', [AbsensiController::class, 'proses']);

Route::get('/rekap', [AbsensiController::class, 'rekap']);