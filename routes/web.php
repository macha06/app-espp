<?php

use App\Http\Controllers\BerandaPetugasController;
use App\Http\Controllers\BerandaSiswaController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('petugas')->middleware(['auth', 'auth.petugas'])->group(function () {
    //ini route untuk petugas
    Route::get('beranda', [BerandaPetugasController::class, 'index'])->name('petugas.beranda');
});

Route::prefix('siswa')->middleware(['auth', 'auth.siswa'])->group(function () {
    //ini route untuk siswa
    Route::get('beranda', [BerandaSiswaController::class, 'index'])->name('siswa.beranda');
});

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    //ini route untuk admin
    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.beranda');
    Route::resource('user', UserController::class);
    Route::resource('wali' , WaliController::class);
    Route::resource('siswa' , SiswaController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');