<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelanggaranController;

Route::prefix('keamanan')->group(function () {
    Route::prefix('pelanggaran')->group(function () {
        Route::get('/', [PelanggaranController::class, 'index']);
        Route::post('/store', [PelanggaranController::class, 'store']);
        Route::get('/edit/{id}', [PelanggaranController::class, 'edit']);
        Route::put('/update/{id}', [PelanggaranController::class, 'update']);
        Route::delete('/delete/{id}', [PelanggaranController::class, 'destroy']);
    });
});