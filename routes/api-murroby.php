<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MurrobyController;
use App\Http\Controllers\PerilakuController;
use App\Http\Controllers\UangSakuController;
use App\Http\Controllers\KelengkapanController;

Route::prefix('murroby')->group(function () {
    Route::get('/santri/{idUser}', [MurrobyController::class, 'index']);

    Route::get('/santri/pemeriksaan/{idUser}', [MurrobyController::class, 'pemeriksaan']);
    Route::post('/santri/pemeriksaan', [MurrobyController::class, 'storePemeriksaan']);
    Route::get('/santri/pemeriksaan/detail/{noInduk}', [MurrobyController::class, 'detailPemeriksaan']);
    Route::get('/santri/pemeriksaan/edit/{idPemeriksaan}', [MurrobyController::class, 'editPemeriksaan']);
    Route::put('/santri/pemeriksaan/update/{idPemeriksaan}', [MurrobyController::class, 'updatePemeriksaan']);
    Route::delete('/santri/pemeriksaan/{idPemeriksaan}', [MurrobyController::class, 'deletePemeriksaan']);

    // Uang Saku
    Route::get('/uang-saku/{idUser}', [UangSakuController::class, 'index']);

    // Transaksi Saku
    Route::get('/saku-masuk/{noInduk}', [UangSakuController::class, 'uangMasuk']);
    Route::post('/saku-masuk', [UangSakuController::class, 'storeUangMasuk']);
    Route::post('/reset-saku', [UangSakuController::class, 'resetSaldo']);
    Route::get('/saku-keluar/{noInduk}', [UangSakuController::class, 'uangKeluar']);
    Route::post('/saku-keluar', [UangSakuController::class, 'storeUangKeluar']);

    // Perilaku
    Route::get('/santri/perilaku/{idUser}', [PerilakuController::class, 'index']);
    Route::post('/santri/perilaku', [PerilakuController::class, 'store']);
    Route::get('/santri/perilaku/detail/{noInduk}', [PerilakuController::class, 'show']);
    Route::get('/santri/perilaku/edit/{idPerilaku}', [PerilakuController::class, 'edit']);
    Route::put('/santri/perilaku/update/{idPerilaku}', [PerilakuController::class, 'update']);
    Route::delete('/santri/perilaku/{idPerilaku}', [PerilakuController::class, 'delete']);

    // Kelengkapan
    Route::get('/santri/kelengkapan/{idUser}', [KelengkapanController::class, 'index']);
    Route::post('/santri/kelengkapan', [KelengkapanController::class, 'store']);
    Route::get('/santri/kelengkapan/detail/{noInduk}', [KelengkapanController::class, 'show']);
    Route::get('/santri/kelengkapan/edit/{idKelengkapan}', [KelengkapanController::class, 'edit']);
    Route::put('/santri/kelengkapan/update/{idKelengkapan}', [KelengkapanController::class, 'update']);
    Route::delete('/santri/kelengkapan/{idKelengkapan}', [KelengkapanController::class, 'delete']);
});