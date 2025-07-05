<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeuanganController;

Route::prefix('keuangan')->group(function () {
    Route::post('/lapor-bayar', [KeuanganController::class, 'laporBayar']);
});