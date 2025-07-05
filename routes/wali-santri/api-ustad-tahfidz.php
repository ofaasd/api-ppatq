<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UstadTahfidzController;

Route::prefix('ustad-tahfidz')->group(function () {
    Route::get('/santri/{idUser}', [UstadTahfidzController::class, 'listSantri']);
    Route::get('/tahfidz/{idUser}', [UstadTahfidzController::class, 'index']);
    Route::get('/tahfidz/edit/{idDetailTahfidz}', [UstadTahfidzController::class, 'edit']);
    Route::put('/tahfidz/update/{idDetailTahfidz}', [UstadTahfidzController::class, 'update']);
    Route::post('/tahfidz', [UstadTahfidzController::class, 'store']);
    Route::get('/tahfidz/show/{noInduk}', [UstadTahfidzController::class, 'detailSantri']);
    Route::delete('/tahfidz/{idDetailTahfidz}', [UstadTahfidzController::class, 'delete']);
});