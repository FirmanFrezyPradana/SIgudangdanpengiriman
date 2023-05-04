<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\barangController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\hakaksesController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\kendaraanController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\outletController;
use App\Http\Controllers\pemesananController;
use App\Http\Controllers\pengirimanController;
use App\Http\Controllers\pengunaController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sopirController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\trackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\ReturnTypePass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route login
Route::controller(logincontroller::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('actionlogin', 'actionlogin')->name('actionlogin');
    Route::get('actionlogout', 'actionlogout')->name('actionlogout');
});

// // controller admin
// Route::group(['middleware' => ['auth,isLogin::admin']], function () {
//     //
// });
// home
Route::get('/admin/dashboard', [admincontroller::class, 'index'])->name('dashboardAdmin');

// register
Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('register/action', [registerController::class, 'actionregister'])->name('actionregister');

// kendaraan
Route::get('admin/kendaraan', [kendaraanController::class, 'index'])->name('kendarann');

// jadwal
Route::get('admin/jadwal', [jadwalController::class, 'index'])->name('jadwal');

// hak akses
Route::get('admin/hakakses', [hakaksesController::class, 'index'])->name('hakakses');
Route::post('admin/hakakses/actionTambah', [hakaksesController::class, 'actionTambah'])->name('actionTambahhakakases');

// gudang
Route::get('admin/gudang', [gudangController::class, 'index'])->name('gudang');

// rute
Route::get('admin/track', [trackController::class, 'index'])->name('track');

// pengguna
Route::get('admin/pengguna', [pengunaController::class, 'index'])->name('pengguna');

// sopir
Route::get('admin/sopir', [sopirController::class, 'index'])->name('sopir');

// outlet
Route::get('admin/outlet', [outletController::class, 'index'])->name('outlet');

// pengiriman
Route::get('admin/pengiriman', [pengirimanController::class, 'index'])->name('pengiriman');

// pemesanan
Route::get('admin/pesan', [pemesananController::class, 'index'])->name('pesan');
Route::get('admin/pemesanan', [pemesananController::class, 'pemesanan'])->name('pemesanan');


// Barang masuk
Route::get('admin/brg_masuk', [stokController::class, 'index'])->name('brg_masuk');

// kategori
Route::get('admin/kategori', [kategoriController::class, 'index'])->name('kategori');

// Barang
Route::get('admin/Barang', [barangController::class, 'index'])->name('barang');
