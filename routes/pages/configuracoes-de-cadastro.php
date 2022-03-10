<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\Configuracoes\ConfiguracoesController;

Route::get('/configuracoes-de-cadastro', [ConfiguracoesController::class, 'configuracoes'])->name('configuracoes');
Route::get('/toggle', [ConfiguracoesController::class, 'toggle'])->name('toggle');

Route::post('/criaCulto', [ConfiguracoesController::class, 'criaCulto'])->name('criaCulto');
Route::post('/deletaCulto', [ConfiguracoesController::class, 'deletaCulto'])->name('deletaCulto');
Route::get('/visualizacaoDoCulto', [ConfiguracoesController::class, 'visualizacaoDoCulto'])->name('visualizacaoDoCulto');

Route::post('/criaCampanha', [ConfiguracoesController::class, 'criaCampanha'])->name('criaCampanha');
Route::post('/deletaCampanha', [ConfiguracoesController::class, 'deleteCampanha'])->name('deletaCampanha');
Route::get('/visualizacaoDaCampanha', [ConfiguracoesController::class, 'visualizacaoDaCampanha'])->name('visualizacaoDaCampanha');

