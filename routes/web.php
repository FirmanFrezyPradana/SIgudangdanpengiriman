<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\hakaksesController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registerController;
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

// route View
Route::get('/', [logincontroller::class, 'login'])->name('login')->middleware('guest');
Route::post('actionlogin', [logincontroller::class, 'actionlogin'])->name('actionlogin');

// home
Route::get('/admin/dashboard', [admincontroller::class, 'index'])->name('dashboardAdmin')->middleware('auth');
Route::get('actionlogout', [logincontroller::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// register
Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('register/action', [registerController::class, 'actionregister'])->name('actionregister');

// kendaraan
Route::get('kendaraan', function () {
    return view('admin.kendaraan');
});

// jadwal
Route::get('jadwal', function () {
    return view('admin.jadwal');
});

// hak akses
Route::get('hakakses', function () {
    return view('admin.hakakses');
})->name('hakakses');
// Route::get('hakakses',[hakaksesController::class,'index'])
Route::post('hakakses/actionTambah', [hakaksesController::class, 'actionTambah'])->name('actionTambahhakakases');
// gudang
Route::get('gudang', function () {
    return view('admin.gudang');
});

// rute
Route::get('rute', function () {
    return view('admin.track');
});
