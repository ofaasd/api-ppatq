<?php

use App\Http\Controllers\DashboardAbahController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KelengkapanController;
use App\Http\Controllers\KerapianController;
use App\Http\Controllers\MurrobyController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PelanggaranKetertibanController;
use App\Http\Controllers\PerilakuController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\ReplyKeluhanController;
use App\Http\Controllers\UangSakuController;
use Illuminate\Support\Facades\Route;








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
    
    // Keamanan
    Route::get('/keluhan', [ReplyKeluhanController::class, 'index']);

    Route::prefix('santri')->group(function () {
        Route::get('/{search?}', [DashboardAbahController::class, 'santri']);
        Route::get('/detail/{noInduk}', [DashboardAbahController::class, 'detailSantri']);
    });

    Route::prefix('pelanggaran')->group(function () {
        Route::get('/', [PelanggaranController::class, 'index']);
        Route::post('/store', [PelanggaranController::class, 'store']);
        Route::get('/edit/{id}', [PelanggaranController::class, 'edit']);
        Route::put('/update/{id}', [PelanggaranController::class, 'update']);
        Route::delete('/delete/{id}', [PelanggaranController::class, 'destroy']);
    });

    Route::prefix('izin')->group(function () {
        Route::get('/', [IzinController::class, 'index']);
        Route::post('/store', [IzinController::class, 'store']);
        Route::get('/edit/{id}', [IzinController::class, 'edit']);
        Route::put('/update/{id}', [IzinController::class, 'update']);
        Route::delete('/delete/{id}', [IzinController::class, 'destroy']);
    });

    Route::prefix('perlengkapan')->group(function () {
        Route::get('/', [PerlengkapanController::class, 'index']);
        Route::post('/store', [PerlengkapanController::class, 'store']);
        Route::get('/edit/{id}', [PerlengkapanController::class, 'edit']);
        Route::put('/update/{id}', [PerlengkapanController::class, 'update']);
        Route::delete('/delete/{id}', [PerlengkapanController::class, 'destroy']);
    });

    Route::prefix('kerapian')->group(function () {
        Route::get('/', [KerapianController::class, 'index']);
        Route::post('/store', [KerapianController::class, 'store']);
        Route::get('/edit/{id}', [KerapianController::class, 'edit']);
        Route::put('/update/{id}', [KerapianController::class, 'update']);
        Route::delete('/delete/{id}', [KerapianController::class, 'destroy']);
    });

    Route::prefix('pelanggaran-ketertiban')->group(function () {
        Route::get('/', [PelanggaranKetertibanController::class, 'index']);
        Route::post('/store', [PelanggaranKetertibanController::class, 'store']);
        Route::get('/edit/{id}', [PelanggaranKetertibanController::class, 'edit']);
        Route::put('/update/{id}', [PelanggaranKetertibanController::class, 'update']);
        Route::delete('/delete/{id}', [PelanggaranKetertibanController::class, 'destroy']);
    });
});