<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DakwahController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GetDataController;

use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\MurrobyController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\KelasKamarController;
use App\Http\Controllers\KesantrianController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ReplyKeluhanController;
use App\Http\Controllers\DashboardAbahController;
use App\Http\Controllers\StaffPengasuhController;
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
// Route::post('/users',[\App\Http\Controllers\UserController::class, 'register']);
// Route::get('siswa',[\App\Http\Controllers\SiswaController::class, 'get_siswa']);
// Route::get('siswa/detail',[\App\Http\Controllers\SiswaController::class, 'get_siswa_detail']);
// Route::get('siswa/verifikasi',[\App\Http\Controllers\SiswaController::class, 'verifikasi_api']);
// Route::post('siswa/login',[\App\Http\Controllers\SiswaController::class, 'login']);
// Route::post('siswa/logout',[\App\Http\Controllers\SiswaController::class, 'logout']);

// Get Santri
Route::prefix('get')->group(function () {
    Route::get('/santri/{search?}', [GetDataController::class, 'siswa']);
    Route::get('/kelas', [GetDataController::class, 'kelas']);
    Route::get('/kode-juz', [GetDataController::class, 'kodeJuz']);
    Route::get('/kategori-keluhan', [GetDataController::class, 'kategoriKeluhan']);
    Route::get('/bank', [GetDataController::class, 'bank']);
});

//Jenis Pembayaran
Route::get('/jenis_pembayaran',[\App\Http\Controllers\JenisPembayaranController::class, 'index']);

// Kesehatan Santri
Route::get('/kesehatan-santri', [KesehatanSantriController::class, 'index']);

// Berita
Route::get('/berita', [BeritaController::class, 'index']);

// Dakwah
Route::get('/dakwah', [DakwahController::class, 'index']);

// Agenda
Route::get('/agenda', [AgendaController::class, 'index']);

// About
Route::get('/about', [AboutController::class, 'index']);

// Galeri
Route::get('/galeri', [GaleriController::class, 'index']);

// Keluhan
Route::post('/keluhan', [KeluhanController::class, 'store']);

// Rekening
Route::get('/rekening', [RekeningController::class, 'index']);

// Keluhan
Route::get('/tutorial-pembayaran', [TutorialController::class, 'indexPembayaran']);
Route::post('/tutorial-pembayaran', [TutorialController::class, 'storePembayaran']);

// Staff Dan Pengasuh
Route::get('/get-ustadz', [StaffPengasuhController::class, 'getUstadz']);
Route::get('/get-murroby', [StaffPengasuhController::class, 'getMurroby']);
Route::get('/get-staff', [StaffPengasuhController::class, 'getStaff']);

// Kesantrian
Route::get('/kesantrian', [KesantrianController::class, 'index']);

Route::get('/kelas-kamar', [KelasKamarController::class, 'index']);
Route::get('/kelas/{id}', [KelasKamarController::class, 'showKelas']);
Route::get('/kamar/{id}', [KelasKamarController::class, 'showKamar']);

Route::middleware('update.lastseen')->group(function () {
    // Autentikasi Ustad
    Route::post('/ustad/login', [MurrobyController::class, 'login']);

    // Autentikasi Keuangan
    Route::post('/keuangan/login', [MurrobyController::class, 'login']);
});

Route::middleware(['auth:api', 'update.lastseen'])->group(function () {
    // log out ustad
    Route::post('/ustad/logout', [MurrobyController::class, 'logout']);
    
    // log out keuangan
    Route::post('/keuangan/logout', [MurrobyController::class, 'logout']);

    // Keuangan
    require __DIR__ . '/api-keuangan.php';

    // Murroby
    require __DIR__ . '/api-murroby.php';

    // Ustad Tahfidz
    require __DIR__ . '/api-ustad-tahfidz.php';

    // Abah
    require __DIR__ . '/api-abah.php';

    // Keamanan
    require __DIR__ . '/api-keamanan.php';
});

// API Wali Santri
require __DIR__ . '/api-wali-santri.php';