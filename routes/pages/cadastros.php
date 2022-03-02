<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\Informacoes\InformacoesController;


Route::get('/visitantes', [InformacoesController::class, 'visitantes'])->name('visitantes');
Route::get('/integrantes', [InformacoesController::class, 'integrantes'])->name('integrantes');
Route::get('/acesso', [InformacoesController::class, 'acesso'])->name('acesso');
