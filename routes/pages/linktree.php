<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrativo\Linktree\LinktreeController;

Route::name('linktree.')
    ->group(function () {
        Route::get('fique-por-dentro', [LinktreeController::class, 'index'])->name('index');
        Route::get('/agenda', [LinktreeController::class, 'agenda'])->name('agenda');

//Admnistrativo
        Route::group(['middleware' => 'auth', 'prefix' => 'administrativo'], function () {
            Route::get('/paginas', [LinktreeController::class, 'pagina'])->name('pagina');
            Route::get('/pagina/links', [LinktreeController::class, 'paginaLinks'])->name('paginaLinks');
            Route::get('/pagina/design', [LinktreeController::class, 'paginaDesign'])->name('paginaDesign');
            Route::get('/pagina/estatisticas', [LinktreeController::class, 'paginaEstatisticas'])->name('paginaEstatisticas');
            Route::get('/link-ordem/{cod_pagina}/{cod_link}/{nova_posicao}', [LinktreeController::class, 'linkOrdemAtualiza']);
            Route::get('/pagina/novo/links/{cod_pagina}', [LinktreeController::class, 'novoLink'])->name('novoLink');
            Route::post('/pagina/novo/links/{cod_pagina}', [LinktreeController::class, 'novoLinkAcao'])->name('novoLinkAcao');
            /*Route::post('/desativaVisitante', [InformacoesController::class, 'desativaVisitante']);
            Route::post('/cria-acesso', [InformacoesController::class, 'criaAcesso'])->name('cria-acesso');
            Route::post('/deleta-usuario', [InformacoesController::class, 'deletaUsuario'])->name('deletaUsuario');
            */
        });
    });
