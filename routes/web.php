<?php


use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\StaffKonselingController;
use App\Http\Controllers\JadwalUserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KonselingUserController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\ArtikelController::class, 'index'])->name('home');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::resource('artikel', ArtikelController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('staff_konseling', StaffKonselingController::class);
});

Route::resource('jadwal_user', JadwalUserController::class);
Route::resource('beranda', BerandaController::class);
Route::resource('konseling_user', KonselingUserController::class);
Route::resource('kontak', KontakController::class);

require __DIR__.'/auth.php';
