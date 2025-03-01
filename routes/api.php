<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KesehatanSantriController;

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
//Route untuk user
Route::post('/users',[\App\Http\Controllers\UserController::class, 'register']);
Route::get('siswa',[\App\Http\Controllers\SiswaController::class, 'get_siswa']);
Route::get('siswa/detail',[\App\Http\Controllers\SiswaController::class, 'get_siswa_detail']);
Route::get('siswa/verifikasi',[\App\Http\Controllers\SiswaController::class, 'verifikasi_api']);
Route::post('siswa/login',[\App\Http\Controllers\SiswaController::class, 'login']);
Route::post('siswa/logout',[\App\Http\Controllers\SiswaController::class, 'logout']);
Route::post('pembayaran',[\App\Http\Controllers\PembayaranController::class, 'store']);


//Jenis Pembayaran
Route::get('/jenis_pembayaran',[\App\Http\Controllers\JenisPembayaranController::class, 'index']);

// Kesehatan Santri
Route::get('/kesehatan-santri', [KesehatanSantriController::class, 'index']);