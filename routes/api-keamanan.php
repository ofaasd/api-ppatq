<?php

use App\Models\PelanggaranKetertiban;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KerapianController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\ReplyKeluhanController;
use App\Http\Controllers\DashboardAbahController;
use App\Http\Controllers\PelanggaranKetertibanController;

Route::prefix('keamanan')->group(function () {
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