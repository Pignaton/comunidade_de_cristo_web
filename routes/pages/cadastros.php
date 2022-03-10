<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\Informacoes\InformacoesController;

Route::get('/integrantes', [InformacoesController::class, 'integrantes'])->name('integrantes');

Route::get('/visitantes', [InformacoesController::class, 'visitantes'])->name('visitantes');
Route::get('/informacao-visitante/{cod_pessoa}', [InformacoesController::class, 'informacaoVisitante']);
Route::post('/editar-visitante', [InformacoesController::class, 'editaVisitante']);
Route::post('/desativaVisitante', [InformacoesController::class, 'desativaVisitante']);

Route::get('/acesso', [InformacoesController::class, 'acesso'])->name('acesso');
Route::post('/cria-acesso', [InformacoesController::class, 'criaAcesso'])->name('cria-acesso');


