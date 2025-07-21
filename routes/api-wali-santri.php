<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UangSakuController;
use App\Http\Controllers\WaliSantriController;

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
        
        Route::get('/keluhan/{noInduk}', [WaliSantriController::class, 'keluhan']);

        Route::get('/perlengkapan/{noInduk}', [WaliSantriController::class, 'perlengkapan']);
        Route::get('/pelanggaran/{noInduk}', [WaliSantriController::class, 'pelanggaran']);
        Route::get('/izin/{noInduk}', [WaliSantriController::class, 'izin']);
        Route::get('/kerapian/{noInduk}', [WaliSantriController::class, 'kerapian']);
        Route::get('/pelanggaran-ketertiban/{noInduk}', [WaliSantriController::class, 'pelanggaranketertiban']);
    });
});