<?php

use App\Http\Controllers\Barang\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\auth\LoginController;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/proses-login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/landing', function () {
    return view('landing');
});

// Route::get('/produk-tes', function () {
//     return view('produk');
// });

Route::get('landing-page', [LandingController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('/test', function () {
//     return view('layouts.backend.app');
// });
Route::middleware('auth')->group(function (){
    Route::resource('/kategori', KategoriController::class)->names('kategori');
    Route::resource('/produk', ProdukController::class)->names('produk');
});

