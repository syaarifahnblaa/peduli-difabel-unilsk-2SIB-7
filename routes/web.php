<?php

use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});
Route::resource('\user',\App\Http\Controllers\UserController::class);

Route::resource('\seminar', \App\Http\Controllers\SeminarController::class);

// Route::get('layout', function(){
//     return view('layouts.main');
// });
// // Route::get('jquery', function(){
// //     return view('jquery.latihan1');
// // });
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/', function(){return view('welcome');


