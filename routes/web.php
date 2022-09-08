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
    return view('welcome');
});

// AUTHENTICATION ROUTE
Auth::routes([
    'register' => false,
    'reset' => false,
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// DOSEN ROUTE
Route::get('/dosen/dashboard', [App\Http\Controllers\Dosen\DashboardController::class, 'index']);

// MAHASISWA ROUTE
Route::get('/mahasiswa/dashboard', [App\Http\Controllers\Mahasiswa\DashboardController::class, 'index']);
Route::get('/mahasiswa/profile', function () {
    return view('mahasiswa.profile');
});
