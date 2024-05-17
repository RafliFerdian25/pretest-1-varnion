<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// Pretest-1 Home User
Route::controller(HomeController::class)->group(function () {
    Route::get('/user', 'index')->name('user');
    Route::get('/user/data', 'getDataUser')->name('get.data.user');
    Route::get('/user/random/data', 'getRandomUser')->name('get.random.user');
});

// Pretest-2 Data Barang
Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/barang', 'index')->name('product');
        Route::get('/barang/data', 'getProduct')->name('get.product.data');
        Route::get('/barang/create', 'create')->name('product.create');
        Route::post('/barang', 'store')->name('product.store');
        Route::get('/barang/{barang}/edit', 'edit')->name('product.edit');
        Route::put('/barang/{barang}', 'update')->name('product.update');
    });
});
