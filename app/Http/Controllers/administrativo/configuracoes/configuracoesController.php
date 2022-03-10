<?php

namespace App\Http\Controllers\Administrativo\Configuracoes;

use App\Models\Campanha;
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

class ConfiguracoesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function configuracoes()
    {
        $cultos = Culto::all();
        $campanhas = Campanha::all();
        $statusCampo = Sistema::all();
        return view('pages/configuracoes/configuracoes-de-cadastro', [
            'cultos' => $cultos,
            'campanhas' => $campanhas,
            'statusCampo' => $statusCampo
        ]);
    }

    protected function criaCulto(Request $request)
    {

        if ($this->validador($request->all())->fails()) {
            return redirect('configuracoes-de-cadastro')
                ->withErrors($this->validador($request->all()))
                ->withInput();
        }

        $culto = new Culto();
        $culto->nom_culto = $request->nomeCulto;
        $culto->dia_culto = $request->diaCulto;
        $culto->ind_periodo = $request->periodo;
        $culto->save();

        return redirect('/configuracoes-de-cadastro')->with('culto', 'Culto adicionado com sucesso');
    }

    protected function criaCampanha(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nomeCampanha' => 'required|max:100'
        ]);

        if ($validador->fails()) {
            return redirect('configuracoes-de-cadastro')
                ->withErrors($validador)
                ->withInput();
        }

        $campanha = new Campanha();
        $campanha->nom_campanha = $request->nomeCampanha;
        $campanha->save();

        return redirect('/configuracoes-de-cadastro')->with('campanha', 'Campanha adicionada com sucesso');
    }


    //Exibe ou não o campo culto ou campanha no cadastro
    protected function toggle(Request $request)
    {
        $nom_campo = $request->input('nom_campo');
        $status = $request->input('status');

        if ($status === 'true') {
            $status = '1';
        } else {
            $status = '0';
        }

        $sistema = Sistema::where('nom_campo', $nom_campo)->update(['status' => $status]);
        return $sistema;

    }

    protected function visualizacaoDoCulto(Request $request)
    {
        $cod_culto = $request->input('cod_culto');
        $status = $request->input('status');

        $status === 'A' ? $status = 'I' : $status = 'A';

        $culto = Culto::find($cod_culto);
        $culto->status = $status;
        $culto->save();

    }

    protected function visualizacaoDaCampanha(Request $request)
    {
        $cod_campanha = $request->input('cod_campanha');
        $status = $request->input('status');

        $status === 'A' ? $status = 'I' : $status = 'A';

        $campanha = Campanha::find($cod_campanha);
        $campanha->status = $status;
        $campanha->save();
    }

    public function deletaCulto(Request $request)
    {
        $request->cod_culto;
        $culto = Culto::find($request->cod_culto);
        $culto->delete();
    }

    public function deleteCampanha(Request $request){
        $request->cod_campanha;
        $campanha = Campanha::find($request->cod_campanha);
        $campanha->delete();
    }

    protected function validador($data)
    {
        return Validator::make($data, [
            'nomeCulto' => ['required', 'string', 'max:50'],
            'diaCulto' => ['required'],
            'periodo' => ['required']
        ]);
    }

}
