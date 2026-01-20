<?php

use App\Http\Controllers\KemadrasahanController;
use Illuminate\Support\Facades\Route;

Route::prefix('kemadrasahan')->as('kemadrasahan')->group(function () {
    Route::get('/get-data-santri/{noInduk}', [KemadrasahanController::class, 'getDataSantri'])->name('.get-data-santri');
});