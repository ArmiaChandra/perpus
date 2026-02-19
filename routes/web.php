<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Siswa\PeminjamanController;
use App\Http\Controllers\Siswa\PengembalianController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

Route::get('/', function () {
    return redirect('/login');
});

// login & register
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout']);

// tambah buku
Route::resource('/admin/buku', BukuController::class);

// kelola anggota
Route::prefix('admin')->group(function () {

    Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'index']);
    Route::post('/anggota/store', [App\Http\Controllers\AnggotaController::class, 'store']);
    Route::post('/anggota/update/{id}', [App\Http\Controllers\AnggotaController::class, 'update']);
    Route::get('/anggota/delete/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout']);

// Peminjaman
Route::get('/siswa/peminjaman', [SiswaController::class, 'peminjaman']);
Route::post('/siswa/pinjam', [SiswaController::class, 'pinjam'])
    ->name('siswa.pinjam');

// Pengembalian
Route::get('/siswa/pengembalian', [SiswaController::class, 'pengembalian']);
Route::get('/siswa/pengembalian/kembali/{id}', [SiswaController::class, 'kembali']);

// Histori
Route::get('/admin/histori', [AdminController::class, 'histori']);
