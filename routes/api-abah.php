<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DawuhAbahController;
use App\Http\Controllers\AbahKeuanganController;
use App\Http\Controllers\ReplyKeluhanController;
use App\Http\Controllers\UstadTahfidzController;
use App\Http\Controllers\DashboardAbahController;

Route::prefix('abah')->group(function () {
    Route::get('/dashboard', [DashboardAbahController::class, 'index']);
    Route::get('/psb/{search?}', [DashboardAbahController::class, 'psb']);

    Route::prefix('santri')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'santri']);
        Route::get('/detail/{noInduk}', [DashboardAbahController::class, 'detailSantri']);
    });

    Route::prefix('alumni')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'alumni']);
        // Route::get('/detail/{noInduk}', [DashboardAbahController::class, 'detailSantri']);
    });

    Route::prefix('pegawai')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'pegawai']);
        Route::get('/detail/{idPegawai}', [DashboardAbahController::class, 'detailPegawai']);
    });

    Route::prefix('kurban')->group(function () {
        Route::get('/', [DashboardAbahController::class, 'kurban']);
        Route::get('/show/{kodeJenis}', [DashboardAbahController::class, 'showKorban']);
        Route::get('/riwayat', [DashboardAbahController::class, 'riwayatKorban']);
    });
    
    Route::prefix('pelanggaran')->group(function () {
        Route::get('/', [DashboardAbahController::class, 'pelanggaran']);
        Route::get('/show/{kodeKategori}', [DashboardAbahController::class, 'showPelanggaran']);
    });

    Route::prefix('kelengkapan')->group(function () {
        Route::get('/', [DashboardAbahController::class, 'kelengkapan']);
        // Route::get('/show/{kodeJenis}', [DashboardAbahController::class, 'showKelengkapan']);
    });

    Route::prefix('kesehatan')->group(function () {
        Route::get('/', [DashboardAbahController::class, 'kesehatan']);
        // Route::get('/show/{kodeJenis}', [DashboardAbahController::class, 'showKesehatan']);
    });

    Route::get('/belum-lapor/{search?}', [DashboardAbahController::class, 'belumMelaporkan']);
    Route::get('/bayar-valid', [DashboardAbahController::class, 'pembayaranValidBulanIni']);
    Route::get('/bayar-bulan-lalu', [DashboardAbahController::class, 'pembayaranBulanLalu']);

    Route::prefix('kamar')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'kamar']);
        Route::get('/show/{id}', [DashboardAbahController::class, 'showKamar']);
    });
    
    Route::prefix('kelas')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'kelas']);
        Route::get('/show/{kode}', [DashboardAbahController::class, 'showKelas']);
    });

    Route::prefix('tahfidz')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'tahfidz']);
        Route::get('/show/{id}', [DashboardAbahController::class, 'showTahfidz']);
        Route::get('/detail/{noInduk}', [UstadTahfidzController::class, 'detailSantri']);
    });

    Route::get('/aset', [DashboardAbahController::class, 'aset']);

    Route::get('/murroby', [DashboardAbahController::class, 'murroby']);
    Route::get('/ustad-tahfidz', [DashboardAbahController::class, 'ustadTahfidz']);
    
    // Dawuh Abah
    Route::prefix('keuangan')->group(function () {
        
        Route::get('/saku/{kodeKelas}', [AbahKeuanganController::class, 'saku']);
        Route::get('/lapor-bayar', [AbahKeuanganController::class, 'laporBayar']);

        Route::prefix('syahriah')->group(function () {
            Route::get('/{search?}', [AbahKeuanganController::class, 'syahriah']);
            Route::get('/detail/{kodeKelas}', [AbahKeuanganController::class, 'detailSyahriah']);
        });
    });

    // Dawuh Abah
    Route::prefix('dawuh-abah')->group(function () {
        Route::get('/', [DawuhAbahController::class, 'index']);
        Route::post('/store', [DawuhAbahController::class, 'store']);
        Route::get('/edit/{id}', [DawuhAbahController::class, 'edit']);
        Route::put('/update/{id}', [DawuhAbahController::class, 'update']);
        Route::delete('/delete/{id}', [DawuhAbahController::class, 'destroy']);
    });

    // Balas Keluhan
    Route::prefix('reply-keluhan')->group(function () {
        Route::get('/', [ReplyKeluhanController::class, 'index']);
        Route::post('/store', [ReplyKeluhanController::class, 'store']);
        Route::get('/edit/{idKeluhan}', [ReplyKeluhanController::class, 'edit']);
        Route::put('/update/{idKeluhan}', [ReplyKeluhanController::class, 'update']);
        Route::delete('/delete/{idBalasan}', [ReplyKeluhanController::class, 'destroy']);
    });
});