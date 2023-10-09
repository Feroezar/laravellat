<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
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
//route resource
// Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/mahasiswa', \App\Http\Controllers\MahasiswaController::class);
