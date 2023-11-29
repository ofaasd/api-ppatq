<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/users',[\App\Http\Controllers\UserController::class, 'register']);
Route::post('/verifikasi_siswa',[\App\Http\Controllers\SiswaController::class, 'verifikasi']);
