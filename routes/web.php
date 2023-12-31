<?php

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

Route::resource('/konseling',\App\Http\Controllers\konselingController::class);

//Route::resource('/staff',\App\Http\Controllers\StaffControllerController::class);

Route::resource('/staff',\App\Http\Controllers\StaffController::class);
