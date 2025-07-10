<?php

use App\Http\Controllers\DashboardAbahController;
use App\Http\Controllers\DawuhAbahController;
use Illuminate\Support\Facades\Route;

Route::prefix('abah')->group(function () {
    Route::get('/dashboard', [DashboardAbahController::class, 'index']);
    Route::get('/psb', [DashboardAbahController::class, 'psb']);
    Route::get('/santri', [DashboardAbahController::class, 'santri']);
    Route::get('/pegawai', [DashboardAbahController::class, 'pegawai']);
    Route::get('/belum-lapor', [DashboardAbahController::class, 'belumMelaporkan']);
    Route::get('/bayar-valid', [DashboardAbahController::class, 'pembayaranValidBulanIni']);
    Route::get('/bayar-bulan-lalu', [DashboardAbahController::class, 'pembayaranBulanLalu']);

    Route::get('/kamar', [DashboardAbahController::class, 'kamar']);
    Route::get('/kelas', [DashboardAbahController::class, 'kelas']);
    Route::get('/tahfidz', [DashboardAbahController::class, 'tahfidz']);

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
});