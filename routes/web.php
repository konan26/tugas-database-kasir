<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;

/*
|--------------------------------------------------------------------------
| LOGIN DEFAULT (WAJIB UNTUK AUTH)
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| AUTH (LOGIN UMUM)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AdminAuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AdminAuthController::class, 'login'])
    ->name('login.submit');

// REGISTER
Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.submit');

// LOGOUT
Route::post('/logout', [AdminAuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {


    Route::resource('/produk', ProdukController::class);

    Route::get('/pembelian', [PembelianController::class, 'index'])
        ->name('admin.pembelian.index');

    Route::post('/pembelian', [PembelianController::class, 'store'])
        ->name('admin.pembelian.store');
});

/*
|--------------------------------------------------------------------------
| PETUGAS AREA (CLONE DARI ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('petugas')->group(function () {

    Route::resource('/produk', ProdukController::class)
        ->names('petugas.produk');

    Route::get('/pembelian', [PembelianController::class, 'index'])
        ->name('petugas.pembelian.index');

    Route::post('/pembelian', [PembelianController::class, 'store'])
        ->name('petugas.pembelian.store');
});
