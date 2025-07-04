<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DakwahController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GetDataController;

use App\Http\Controllers\MurrobyController;
use App\Http\Controllers\UangSakuController;
use App\Http\Controllers\KelasKamarController;
use App\Http\Controllers\KelengkapanController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KesantrianController;
use App\Http\Controllers\WaliSantriController;
use App\Http\Controllers\UstadTahfidzController;
use App\Http\Controllers\StaffPengasuhController;
use App\Http\Controllers\KesehatanSantriController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PerilakuController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TutorialController;

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
    Route::prefix('keuangan')->group(function () {
        Route::post('/lapor-bayar', [KeuanganController::class, 'laporBayar']);
    });

    // Murroby
    Route::prefix('murroby')->group(function () {
        Route::get('/santri/{idUser}', [MurrobyController::class, 'index']);

        Route::get('/santri/pemeriksaan/{idUser}', [MurrobyController::class, 'pemeriksaan']);
        Route::post('/santri/pemeriksaan', [MurrobyController::class, 'storePemeriksaan']);
        Route::get('/santri/pemeriksaan/detail/{noInduk}', [MurrobyController::class, 'detailPemeriksaan']);
        Route::get('/santri/pemeriksaan/edit/{idPemeriksaan}', [MurrobyController::class, 'editPemeriksaan']);
        Route::put('/santri/pemeriksaan/update/{idPemeriksaan}', [MurrobyController::class, 'updatePemeriksaan']);
        Route::delete('/santri/pemeriksaan/{idPemeriksaan}', [MurrobyController::class, 'deletePemeriksaan']);

        Route::get('/santri/perilaku/{idUser}', [PerilakuController::class, 'index']);
        Route::post('/santri/perilaku', [PerilakuController::class, 'store']);
        Route::get('/santri/perilaku/detail/{noInduk}', [PerilakuController::class, 'show']);
        Route::get('/santri/perilaku/edit/{idPerilaku}', [PerilakuController::class, 'edit']);
        Route::put('/santri/perilaku/update/{idPerilaku}', [PerilakuController::class, 'update']);
        Route::delete('/santri/perilaku/{idPerilaku}', [PerilakuController::class, 'delete']);
        
        Route::get('/santri/kelengkapan/{idUser}', [KelengkapanController::class, 'index']);
        Route::post('/santri/kelengkapan', [KelengkapanController::class, 'store']);
        Route::get('/santri/kelengkapan/detail/{noInduk}', [KelengkapanController::class, 'show']);
        Route::get('/santri/kelengkapan/edit/{idKelengkapan}', [KelengkapanController::class, 'edit']);
        Route::put('/santri/kelengkapan/update/{idKelengkapan}', [KelengkapanController::class, 'update']);
        Route::delete('/santri/kelengkapan/{idKelengkapan}', [KelengkapanController::class, 'delete']);

        // Uang Saku
        Route::get('/uang-saku/{idUser}', [UangSakuController::class, 'index']);

        // Transaksi Saku
        Route::get('/saku-masuk/{noInduk}', [UangSakuController::class, 'uangMasuk']);
        Route::post('/saku-masuk', [UangSakuController::class, 'storeUangMasuk']);
        Route::get('/saku-keluar/{noInduk}', [UangSakuController::class, 'uangKeluar']);
        Route::post('/saku-keluar', [UangSakuController::class, 'storeUangKeluar']);
    });

    // Ustad Tahfidz
    Route::prefix('ustad-tahfidz')->group(function () {
        Route::get('/santri/{idUser}', [UstadTahfidzController::class, 'listSantri']);
        Route::get('/tahfidz/{idUser}', [UstadTahfidzController::class, 'index']);
        Route::get('/tahfidz/edit/{idDetailTahfidz}', [UstadTahfidzController::class, 'edit']);
        Route::put('/tahfidz/update/{idDetailTahfidz}', [UstadTahfidzController::class, 'update']);
        Route::post('/tahfidz', [UstadTahfidzController::class, 'store']);
        Route::get('/tahfidz/show/{noInduk}', [UstadTahfidzController::class, 'detailSantri']);
        Route::delete('/tahfidz/{idDetailTahfidz}', [UstadTahfidzController::class, 'delete']);
    });
});
 
// Wali Santri
Route::prefix('wali-santri')->group(function () {
    Route::post('/login', [WaliSantriController::class, 'login']);

    Route::middleware(['auth:api-siswa', 'update.lastseen'])->group(function () {
        Route::post('/logout', [WaliSantriController::class, 'logout']);
        
        Route::get('/kesehatan/{noInduk}', [WaliSantriController::class, 'kesehatan']);
        Route::get('/ketahfidzan/{noInduk}', [WaliSantriController::class, 'ketahfidzan']);
        Route::get('/perilaku/{noInduk}', [WaliSantriController::class, 'perilaku']);
        Route::get('/kelengkapan/{noInduk}', [WaliSantriController::class, 'kelengkapan']);
        Route::post('/lapor-bayar', [WaliSantriController::class, 'laporBayar']);
        Route::get('/riwayat-bayar/{noInduk}', [WaliSantriController::class, 'riwayatBayar']);

        Route::get('/saku-masuk/{noInduk}', [UangSakuController::class, 'uangMasuk']);
        Route::get('/saku-keluar/{noInduk}', [UangSakuController::class, 'uangKeluar']);
    });
});