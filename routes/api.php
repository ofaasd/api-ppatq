<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KelasKamarController;
use App\Http\Controllers\KesantrianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KesehatanSantriController;
use App\Http\Controllers\MurrobyController;
use App\Http\Controllers\StaffPengasuhController;
use App\Http\Controllers\UangSakuController;

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
Route::post('index-pembayaran',[\App\Http\Controllers\PembayaranController::class, 'index']);
Route::post('pembayaran',[\App\Http\Controllers\PembayaranController::class, 'store']);


//Jenis Pembayaran
Route::get('/jenis_pembayaran',[\App\Http\Controllers\JenisPembayaranController::class, 'index']);

// Kesehatan Santri
Route::get('/kesehatan-santri', [KesehatanSantriController::class, 'index']);

// Berita
Route::get('/berita', [BeritaController::class, 'index']);

// Agenda
Route::get('/agenda', [AgendaController::class, 'index']);

// About
Route::get('/about', [AboutController::class, 'index']);

// Galeri
Route::get('/galeri', [GaleriController::class, 'index']);

// Staff Dan Pengasuh
Route::get('/get-ustadz', [StaffPengasuhController::class, 'getUstadz']);
Route::get('/get-murroby', [StaffPengasuhController::class, 'getMurroby']);
Route::get('/get-staff', [StaffPengasuhController::class, 'getStaff']);

// Kesantrian
Route::get('/kesantrian', [KesantrianController::class, 'index']);

// Kesantrian
Route::get('/kelas-kamar', [KelasKamarController::class, 'index']);
Route::get('/kelas/{id}', [KelasKamarController::class, 'showKelas']);
Route::get('/kamar/{id}', [KelasKamarController::class, 'showKamar']);

// Murroby
Route::post('/murroby/login', [MurrobyController::class, 'login']);
Route::get('/murroby/santri/{idUser}', [MurrobyController::class, 'index']);

// Uang Saku
Route::get('/murroby/uang-saku/{idUser}', [UangSakuController::class, 'index']);

Route::get('/murroby/saku-masuk/{noInduk}', [UangSakuController::class, 'uangMasuk']);
Route::post('/murroby/saku-masuk', [UangSakuController::class, 'storeUangMasuk']);
Route::get('/murroby/saku-keluar/{noInduk}', [UangSakuController::class, 'uangKeluar']);
Route::post('/murroby/saku-keluar', [UangSakuController::class, 'storeUangKeluar']);