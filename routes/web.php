<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cadastro', function () {
    return view('cadastro');
});
Route::get('/', function () {
    return redirect('/cadastro');
});

Route::get('/mailable', function () {
    $invoice = [
        'nome' => 'kaleb',
        'email' => 'kpignaton@ymail.com'
    ];

    return new App\Mail\EmailAcesso($invoice);
});

Route::get('/cadastro', [App\Http\Controllers\Administrativo\Cadastro\CadastroController::class, 'index'])->name('cadastro');
Route::post('/cadastroPessoa', [App\Http\Controllers\Administrativo\Cadastro\CadastroController::class, 'cadastro'])->name('cadastroPessoa');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

@include('pages/linktree.php');

Route::group(['middleware' => 'auth', 'prefix' => 'administrativo'], function () {
    Route::get('table-list', function () {
        return view('pages.table_list');
    })->name('table');

    Route::get('typography', function () {
        return view('pages.typography');
    })->name('typography');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::get('rtl-support', function () {
        return view('pages.language');
    })->name('language');

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');

    @include('pages/cadastros.php');
    @include('pages/configuracoes-de-cadastro.php');
    @include('pages/qrcodes.php');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
