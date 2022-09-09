<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

// AUTHENTICATION ROUTE
Auth::routes([
    'register' => false,
    'reset' => false,
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// DOSEN ROUTE
Route::get('/dosen/dashboard', [App\Http\Controllers\Dosen\DashboardController::class, 'index']);
Route::get('/dosen/matakuliah', function () {
    return view('dosen.matakuliah');
});
Route::get('/dosen/generate-qr', function () {
    return view('dosen.generate-qr');
});

// MAHASISWA ROUTE
Route::get('/mahasiswa/dashboard', [App\Http\Controllers\Mahasiswa\DashboardController::class, 'index']);
Route::get('/mahasiswa/profile', [App\Http\Controllers\Mahasiswa\DashboardController::class, 'profile']);
Route::get('/mahasiswa/presensi/{matakuliah_id}/{urutan}/{kunci}', [App\Http\Controllers\Mahasiswa\DashboardController::class, 'presensi']);
