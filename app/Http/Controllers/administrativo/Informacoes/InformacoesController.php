<?php

namespace App\Http\Controllers\Administrativo\Informacoes;

use App\Mail\EmailAcesso;
use App\Http\Requests\AcessoRequest;
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
use Illuminate\Support\Facades\Mail;



class InformacoesController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function visitantes()
    {
        $pessoas = Pessoa::enderecoPessoa();

        return view('pages/cadastro/visitantes/visitante', ['pessoas' => $pessoas]);
    }

    public function integrantes()
    {
        $integrantes = Integrante::enderecoIntegrante();
        return view('pages/cadastro/integrante', ['integrantes' => $integrantes]);
    }

    public function informacaoVisitante($cod_pessoa)
    {
        $pessoas = Pessoa::enderecoPessoa($cod_pessoa);
        return view('pages/cadastro/visitantes/informacao-visitante', ['pessoas' => $pessoas]);
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

    public function criaAcesso(AcessoRequest $request)
    {

        $request->validated();

        $senha_hash = Hash::make('Comunidade123');

        //cria o usuário
        $nomeSobrenome = explode(' ', $request->nome);
        $rest = substr($nomeSobrenome[0], 0, 1);
        $nomeCompleto = $rest.$nomeSobrenome[1];
        $usuario = strtolower($nomeCompleto);


        /* $acesso = new Acesso();
         $acesso->cod_integrante = $request->cod_integrante;
         $acesso->nome = $request->nome;
         $acesso->usuario = $usuario;
         $acesso->email = $request->email;
         $acesso->senha = $senha_hash;
         $acesso->nivel = $request->nivel;
         $acesso->save();*/

        Mail::to($request->email)->locale('pt')->send(new EmailAcesso($request->nome));

        return redirect('/acesso')->with('sucesso', 'usuário criado com sucesso');
    }

    protected function editaVisitante(Request $request)
    {

        $pessoa = Pessoa::find($request->cod_pessoa);
        $pessoa->nome = $request->nome;
        $pessoa->idade = $request->idade;
        $pessoa->email = $request->email;
        $pessoa->telefone = $request->telefone;
        $pessoa->sexo = $request->sexo;
        $pessoa->estado_civil = $request->estado_civil;
        $pessoa->save();

        if (!empty($request->cep) || !empty($request->bairro)) {
            Endereco::where('cod_pessoa', $request->cod_pessoa)
                ->update([
                    'cep' => $request->cep,
                    'endereco' => $request->endereco,
                    'bairro' => $request->bairro,
                    'numero' => $request->numero,
                    'complemento' => $request->complemento,
                    'cidade' => $request->cidade,
                    'estado' => $request->estado,
                ]);
        }
        return redirect()->route('visitantes')->with('sucesso', 'Visitante alterado com sucesso');
    }

    protected function desativaVisitante(Request $request)
    {
        Pessoa::where('cod_pessoa', $request->cod_pessoa)
            ->delete();
        return redirect()->route('visitantes');
    }
}
