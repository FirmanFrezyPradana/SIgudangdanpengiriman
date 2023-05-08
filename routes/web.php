<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registerController;

use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\admin\gudangController;
use App\Http\Controllers\admin\hakaksesController;
use App\Http\Controllers\admin\jadwalController;
use App\Http\Controllers\admin\kendaraanController;
use App\Http\Controllers\admin\laporanController;
use App\Http\Controllers\admin\outletController;
use App\Http\Controllers\admin\pengunaController;
use App\Http\Controllers\admin\sopirController;

use App\Http\Controllers\gudang\dashboardGudang;
use App\Http\Controllers\gudang\barangController;
use App\Http\Controllers\Gudang\gudangLaporan;
use App\Http\Controllers\gudang\pemesananController;
use App\Http\Controllers\gudang\kategoriController;
use App\Http\Controllers\gudang\stokController;
use App\Http\Controllers\gudang\pengirimanController;
use App\Http\Controllers\Pengguna\orderController;
use App\Http\Controllers\Pengguna\dashboardPengguna;
use App\Http\Controllers\Pengguna\outletpengguna;

use App\Http\Controllers\Sopir\trackController;
use App\Http\Controllers\Sopir\dashboardSopir;
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
Route::get('/', [logincontroller::class, 'index'])->name('login');
Route::post('/', [logincontroller::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [logincontroller::class,  'actionlogout'])->name('actionlogout');
// register
Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('register/action', [registerController::class, 'actionregister'])->name('actionregister');


Route::group(['middleware' => ['isAdmin']], function () {

    // home
    Route::get('/admin/dashboard', [admincontroller::class, 'index'])->name('dashboardAdmin');

    // kendaraan
    Route::controller(kendaraanController::class)->group(function () {
        route::get('/admin/kendaraan', 'index')->name('kendarann');
        route::post('/admin/kendaraan/store', 'store')->name('kendaraanStore');
        route::put('/admin/kendaraan/update', 'update')->name('KendaraanUpdate');
        route::get('/admin/kendaraan/delete/{id}', 'destroy')->name('KendaraanDelete');
    });

    // jadwal
    Route::controller(jadwalController::class)->group(function () {
        route::get('/admin/jadwal', 'index')->name('jadwal');
        route::post('/admin/jadwal/store', 'store')->name('jadwalStore');
        route::put('/admin/jadwal/update', 'update')->name('jadwalUpdate');
        route::get('/admin/jadwal/delete/{id}', 'destroy')->name('jadwalDelete');
    });

    // hak akses
    Route::controller(hakaksesController::class)->group(function () {
        route::get('/admin/hakakses', 'index')->name('hakakses');
        route::post('/admin/hakakses/Tambah', 'store')->name('hakaksesStore');
        route::put('/admin/hakakses/update', 'update')->name('hakaksesupdate');
        route::get('/admin/hakakses/delete/{id}', 'destroy')->name('hakaksesDelete');
    });

    // gudang
    Route::controller(gudangController::class)->group(function () {
        route::get('admin/gudang', 'index')->name('gudang');
        route::post('admin/gudang/Tambah', 'store')->name('gudangStore');
        route::put('/admin/gudang/update', 'update')->name('gudangupdate');
        route::get('/admin/gudang/delete/{id}', 'destroy')->name('gudangDelete');
    });

    // Laporan
    Route::get('admin/Laporan/laporanbarang', [laporanController::class, 'laporanBarang'])->name('laporanBarang');
    Route::get('admin/Laporan/laporanpenjualan', [laporanController::class, 'laporanpPenjualan'])->name('laporanpenjualan');
    Route::get('admin/Laporan/laporanstok', [laporanController::class, 'laporanStok'])->name('laporanStok');
    Route::get('admin/Laporan/laporanbrgmasuk', [laporanController::class, 'laporanBrgMasuk'])->name('laporanBrgMasuk');

    // pengguna
    Route::get('admin/pengguna', [pengunaController::class, 'index'])->name('pengguna');

    // sopir
    Route::get('admin/sopir', [sopirController::class, 'index'])->name('sopir');

    // outlet
    Route::get('admin/outlet', [outletController::class, 'index'])->name('outlet');
});

Route::group(['middleware' => ['isGudang']], function () {

    Route::get('gudang/dashboard', [dashboardGudang::class, 'index'])->name('gudangdashboard');

    // Barang
    Route::get('gudang/Barang', [barangController::class, 'index'])->name('barang');

    // pemesanan
    Route::get('gudang/pemesanan', [pemesananController::class, 'index'])->name('pesan');
    Route::get('gudang/pemesanan/pemesanan', [pemesananController::class, 'pemesanan'])->name('pemesanan');

    // kategori
    Route::get('gudang/kategori', [kategoriController::class, 'index'])->name('kategori');

    // Barang masuk
    Route::get('gudang/brg_masuk', [stokController::class, 'index'])->name('brg_masuk');

    // pengiriman
    Route::get('gudang/pengiriman', [pengirimanController::class, 'index'])->name('pengiriman');

    // rute
    Route::get('admin/track', [trackController::class, 'index'])->name('track');

    // Laporan
    Route::get('gudang/Laporan/laporanbarang', [gudangLaporan::class, 'laporanBarang'])->name('laporanBarangGudang');
    Route::get('gudang/Laporan/laporanpenjualan', [gudangLaporan::class, 'laporanpPenjualan'])->name('laporanpenjualanGudang');
    Route::get('gudang/Laporan/laporanstok', [gudangLaporan::class, 'laporanStok'])->name('laporanStokGudang');
    Route::get('gudang/Laporan/laporanbrgmasuk', [gudangLaporan::class, 'laporanBrgMasuk'])->name('laporanBrgMasukGudang');
});

Route::group(['middleware' => ['isPengguna']], function () {

    Route::get('Pengguna/dashboard', [dashboardPengguna::class, 'index'])->name('penggunadashboard');

    Route::get('Pengguna/pemesanan', [orderController::class, 'index'])->name('PesanBarang');
    Route::get('Pengguna/pemesanan/order', [orderController::class, 'pemesanan'])->name('order');

    Route::get('Pengguna/Pengiriman', [orderController::class, 'pengiriman'])->name('Pengiriman');

    Route::get('Pengguna/Outlet', [outletpengguna::class, 'index'])->name('outletpengguna');

    Route::get('Pengguna/History', [orderController::class, 'history'])->name('history');
});

Route::group(['middleware' => ['isSopir']], function () {

    Route::get('Sopir/dashboard', [dashboardSopir::class, 'index'])->name('sopirdashboard');
    Route::get('Sopir/Track', [trackController::class, 'index'])->name('TrackBaru');
    Route::get('Sopir/HistorySopir', [dashboardSopir::class, 'history'])->name('historysopir');
    Route::get('Sopir/Jdwal', [dashboardSopir::class, 'jadwal'])->name('jadwalsopir');
});
