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

            //links
            Route::get('/pagina/links/{cod_pagina}', [LinktreeController::class, 'paginaLinks'])->name('paginaLinks');
            Route::get('/link-ordem/{cod_pagina}/{cod_link}/{nova_posicao}', [LinktreeController::class, 'linkOrdemAtualiza']);
            Route::get('/pagina/novo/links/{cod_pagina}', [LinktreeController::class, 'novoLink'])->name('novoLink');
            Route::post('/pagina/novo/links/{cod_pagina}', [LinktreeController::class, 'novoLinkAcao'])->name('novoLinkAcao');
            Route::get('/pagina/edita/link/{cod_pagina}/{cod_link}', [LinktreeController::class, 'editaLink'])->name('editaLink');
            Route::post('/pagina/edita/link/{cod_pagina}/{cod_link}', [LinktreeController::class, 'editaLinkAcao'])->name('editaLinkAcao');
            Route::post('/deleta/link/{cod_pagina}/{cod_link}', [LinktreeController::class, 'deletaLink'])->name('deletaLink');

            //Design
            Route::get('/pagina/design/{cod_pagina}', [LinktreeController::class, 'paginaDesign'])->name('paginaDesign');
            //Route::get('/pagina/novo/design/{cod_pagina}', [LinktreeController::class, 'novoDesign'])->name('novoDesign');
            Route::post('/pagina/novo/design/{cod_pagina}', [LinktreeController::class, 'novoDesignAcao'])->name('novoDesignAcao');
            // Route::get('/pagina/edita/design/{cod_pagina}', [LinktreeController::class, 'editaLink'])->name('editaLink');
            Route::post('/pagina/edita/design/{cod_pagina}', [LinktreeController::class, 'editaDesignAcao'])->name('editaDesignAcao');

            //Estatistica
            Route::get('/pagina/estatisticas', [LinktreeController::class, 'paginaEstatisticas'])->name('paginaEstatisticas');
        });
    });
