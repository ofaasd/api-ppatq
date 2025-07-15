<?php

use App\Http\Controllers\DashboardAbahController;
use App\Http\Controllers\DawuhAbahController;
use App\Http\Controllers\ReplyKeluhanController;
use Illuminate\Support\Facades\Route;

Route::prefix('abah')->group(function () {
    Route::get('/dashboard', [DashboardAbahController::class, 'index']);
    Route::get('/psb/{search?}', [DashboardAbahController::class, 'psb']);

    Route::prefix('santri')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'santri']);
        Route::get('/detail/{noInduk}', [DashboardAbahController::class, 'detailSantri']);
    });

    Route::prefix('alumni')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'alumni']);
        Route::get('/detail/{noInduk}', [DashboardAbahController::class, 'detailSantri']);
    });

    Route::prefix('pegawai')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'pegawai']);
        Route::get('/detail/{idPegawai}', [DashboardAbahController::class, 'detailPegawai']);
    });

    Route::get('/belum-lapor/{search?}', [DashboardAbahController::class, 'belumMelaporkan']);
    Route::get('/bayar-valid', [DashboardAbahController::class, 'pembayaranValidBulanIni']);
    Route::get('/bayar-bulan-lalu', [DashboardAbahController::class, 'pembayaranBulanLalu']);

    Route::get('/kamar/{search?}', [DashboardAbahController::class, 'kamar']);
    Route::get('/kamar/show/{id}', [DashboardAbahController::class, 'showKamar']);
    
    Route::get('/kelas/{search?}', [DashboardAbahController::class, 'kelas']);
    Route::get('/kelas/show/{kode}', [DashboardAbahController::class, 'showKelas']);

    Route::get('/tahfidz/{search?}', [DashboardAbahController::class, 'tahfidz']);
    Route::get('/tahfidz/show/{id}', [DashboardAbahController::class, 'showTahfidz']);

    Route::get('/aset', [DashboardAbahController::class, 'aset']);

    Route::get('/murroby', [DashboardAbahController::class, 'murroby']);
    Route::get('/ustad-tahfidz', [DashboardAbahController::class, 'ustadTahfidz']);

    Route::get('/kurban', [DashboardAbahController::class, 'kurban']);
    
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