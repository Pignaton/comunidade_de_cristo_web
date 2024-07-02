<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\QrCodes\QrCodesController;

Route::prefix('gerador')
    ->name('qrcodes.')
    ->group(function () {
        Route::get('', [QrCodesController::class, 'index'])->name('index');
        Route::post('/salva/qr-code', [QrCodesController::class, 'salvaQrCode'])->name('salvaQrCode');
        Route::get('/salva/qr-code', [QrCodesController::class, 'criarQrCode'])->name('criarQrCode');
        Route::get('/editar/qr-code/{cod_qr}', [QrCodesController::class, 'editaQrCode'])->name('editaQrCode');
        Route::post('/editar/qr-code/{cod_qr}', [QrCodesController::class, 'editaQrCodeAcao'])->name('editaQrCodeAcao');
    });
