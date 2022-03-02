<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\Configuracoes\ConfiguracoesController;

Route::get('/configuracoes-de-cadastro', [ConfiguracoesController::class, 'configuracoes'])->name('configuracoes');
Route::post('/criaCulto', [ConfiguracoesController::class, 'criaCulto'])->name('criaCulto');
Route::post('/criaCampanha', [ConfiguracoesController::class, 'criaCampanha'])->name('criaCampanha');
Route::get('/toggle', [ConfiguracoesController::class, 'toggle'])->name('toggle');
Route::get('/visualizacaoDoCulto', [ConfiguracoesController::class, 'visualizacaoDoCulto'])->name('visualizacaoDoCulto');
Route::get('/visualizacaoDaCampanha', [ConfiguracoesController::class, 'visualizacaoDaCampanha'])->name('visualizacaoDaCampanha');
Route::get('/deletaCulto', [ConfiguracoesController::class, 'deletaCulto'])->name('deletaCulto');
