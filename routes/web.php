<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
})->name('aspirasi.index');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/kirim-aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::post('/auth', [LoginController::class, 'login'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth.check'])->group(function () {
    Route::get('/dashboard', [AspirasiController::class, 'dashboard'])->name('aspirasi.dashboard');

    Route::get('/data-aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.data');
    Route::get('/riwayat-aspirasi', [AspirasiController::class, 'riwayatIndex'])->name('aspirasi.riwayat');

    Route::put('/aksi-aspirasi/{id}', [AspirasiController::class, 'acceptOrReject'])->name('aspirasi.aksi');
});
