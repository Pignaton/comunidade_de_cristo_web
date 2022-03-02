<?php

namespace App\Http\Controllers\Administrativo\Informacoes;

use App\Models\Acesso;
use App\Models\Integrante;
use App\Models\Pessoa;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class InformacoesController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function visitantes()
    {
        $pessoas = Pessoa::enderecoPessoa();
        return view('pages/cadastro/visitante', ['pessoas' => $pessoas]);
    }

    public function integrantes()
    {
        $integrantes = Integrante::enderecoIntegrante();
        return view('pages/cadastro/integrante', ['integrantes' => $integrantes]);
    }

    public function acesso()
    {
        $acessos = Acesso::all();
        $integrantes = Integrante::all();
        return view('pages/cadastro/acesso', [
            'acessos' => $acessos,
            'integrantes' => $integrantes
        ]);
    }
}
