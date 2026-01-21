<?php

use App\Http\Controllers\KemadrasahanController;
use Illuminate\Support\Facades\Route;

Route::prefix('kemadrasahan')->as('kemadrasahan')->group(function () {
    Route::get('/get-santri/{idUser}', [KemadrasahanController::class, 'getSantri'])->name('.get-santri');
    Route::get('/get-data-mapel', [KemadrasahanController::class, 'getDataMapel'])->name('.get-data-mapel');
    Route::get('/get-data-santri/{noInduk}', [KemadrasahanController::class, 'getDataSantri'])->name('.get-data-santri');
    Route::get('/edit/{idDetail}', [KemadrasahanController::class, 'edit'])->name('.edit');
    Route::post('/store', [KemadrasahanController::class, 'store'])->name('.store');
    Route::delete('/delete/{idDetail}', [KemadrasahanController::class, 'destroy'])->name('.destroy');
});