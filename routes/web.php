<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\MemberController;


Route::get('/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/login', [AdminAuthController::class, 'login'])
    ->name('login.submit');

// LOGOUT
Route::post('/logout', [AdminAuthController::class, 'logout'])
    ->name('logout');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('/produk', ProdukController::class);

    Route::resource('/members', MemberController::class);

    Route::get('/pembelian', [PembelianController::class, 'index'])
        ->name('pembelian.index');

    Route::post('/pembelian', [PembelianController::class, 'store'])
        ->name('pembelian.store');

    Route::get('/petugas/create', [RegisterController::class, 'createPetugas'])
        ->name('petugas.create');

    Route::post('/petugas', [RegisterController::class, 'storePetugas'])
        ->name('petugas.store');
});
Route::middleware('auth')->prefix('petugas')->name('petugas.')->group(function () {
    Route::resource('/produk', ProdukController::class);
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
});
