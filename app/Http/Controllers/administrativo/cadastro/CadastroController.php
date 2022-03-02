<?php

namespace App\Http\Controllers\Administrativo\Cadastro;

use App\Models\Campanha;
use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\Culto;
use App\Models\Sistema;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CadastroController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function index()
    {
        $listaCulto = Culto::listaCulto();
        $campanhas = Campanha::where('status', 'A')->get();
        $statusCampo = Sistema::all();

        return view('cadastro', [
            'listaCulto' => $listaCulto,
            'campanhas' => $campanhas,
            'statusCampo' => $statusCampo
        ]);
    }

    protected function validador(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'idade' => ['required', 'string', 'max:255'],
            'culto' => ['required', 'string'],
            'email' => ['string', 'email', 'max:255', 'unique:pessoa'],
            'sexo' => ['required_without_all']
        ]);
    }

    protected function cadastro(Request $request)
    {
        if ($this->validador($request->all())->fails()) {
            return redirect('cadastro')
                ->withErrors($this->validador($request->all()))
                ->withInput();
        }

        $pessoa = new Pessoa();
        $pessoa->cod_culto = $request->culto;
        if(!empty($request->cod_campanha)){
            $pessoa->cod_campanha = $request->campanha;
        }
        $pessoa->nome = $request->nome;
        $pessoa->idade = $request->idade;
        $pessoa->email = $request->email;
        $pessoa->telefone = $request->telefone;
        $pessoa->sexo = $request->sexo;
        $pessoa->estado_civil = $request->estadocivil;
        $pessoa->save();

        if (!empty($request->cep) || !empty($request->bairro)) {
            $endereco = new Endereco();
            $endereco->cod_pessoa = $pessoa->cod_pessoa;
            $endereco->cep = $request->cep;
            $endereco->endereco = $request->endereco;
            $endereco->bairro = $request->bairro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->cidade = $request->cidade;
            $endereco->estado = $request->estado;
            $endereco->save();
        }
        return redirect()->route('cadastro', ['sucesso' => true]);

    }
}
