<?php

use App\Http\Controllers\Barang\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

// Route::get('/produk-tes', function () {
//     return view('produk');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('/kategori', KategoriController::class)->names('kategori');
Route::resource('/produk', ProdukController::class)->names('produk');
