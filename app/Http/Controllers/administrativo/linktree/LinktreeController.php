<?php

namespace App\Http\Controllers\Administrativo\Linktree;

use App\Models\Campanha;
use App\Models\Visualizacao;
use App\Models\Links;
use App\Models\Pagina;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LinktreeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function index()
    {

        $pagina = Pagina::all()->first();

        if ($pagina) {

            $bg = '#FFFFF';
            switch ($pagina->op_bg_value) {
                case 'image' :
                    $bg = "url('" . url(asset('assets')) . '/' . $pagina->op_bg_value . "')";
                    break;
                case 'color' :
                    $colors = explode(',', $pagina->op_bg_value);
                    $bg = 'linear-gradient(90deg,';
                    $bg .= $colors[0] . ',';
                    $bg .= !empty($colors[1] ? $colors[1] : $colors[0]);
                    $bg .= ')';
                    break;
            }

            $links = Links::where('status', '0')
                ->orderBy('ordem')
                ->get();

            $view = Visualizacao::firstOrNew(
                ['cod_pagina' => $pagina->cod_pagina,
                    'visualizacao_data' => date('Y-m-d')
                ]);

            $view->total++;
            $view->save();

            return view('pages.linktree.index', [
                'font_color' => $pagina->op_font_color,
                'profile_image' => url(asset('assets') . '/' . $pagina->op_profile_image),
                'titulo' => $pagina->op_title,
                'descricao' => $pagina->op_description,
                'fb_pixel' => $pagina->op_fb_pixel,
                'bg' => $bg,
                'links' => $links,

            ]);
        } else {
            return view('pages.404');
        }

        //return view('pages.linktree.index');
    }

    public function agenda()
    {
        return view('pages.linktree.agenda.index');
    }

    public function pagina()
    {
        return view('pages.pagina_de_links.index', ['menu' => 'links']);
    }

    public function paginaLinks()
    {

        $links = Links::orderBy('ordem', 'ASC')->get();

        return view('pages.pagina_de_links.links', [
            'menu' => 'links',
            //'page' => $page,
            'links' => $links
        ]);
    }

    public function linkOrdemAtualiza($cod_link, $nova_posicao) //$cod_pagina
    {
        $link = Links::find($cod_link);

        $myPages = [];
        /*$myPagesQuery = Pagina::where('cod_pagina', $cod_pagina)->get();

        foreach ($myPagesQuery as $pageItem) {
            $myPages[] = $pageItem->cod_links;
        }*/

        if ($link->ordem > $nova_posicao) {
            $afterLinks = Links::where('cod_links', $cod_link)
                ->where('ordem', '>=', $nova_posicao)
                ->get();
            foreach ($afterLinks as $afterLink) {
                $afterLink->ordem++;
                $afterLink->save();
            }
        } elseif ($link->ordem < $nova_posicao) {
            $beforeLinks = Links::where('cod_links', $cod_link)
                ->where('ordem', '<=', $nova_posicao)
                ->get();
            foreach ($beforeLinks as $beforeLink) {
                $beforeLink->ordem--;
                $beforeLink->save();
            }
        }

        $link->ordem = $nova_posicao;
        $link->save();

        $allLinks = Links::where('cod_pagina', $link->cod_pagina)
            ->orderBy('orderm', 'ASC')
            ->get();
        foreach ($allLinks as $linkKey => $linkItem) {
            $linkItem->ordem = $linkKey;
            $linkItem->save();
        }
        return [];
    }

    public function paginaDesign()
    {
        return view('pages.pagina_de_links.design', ['menu' => 'design']);
    }

    public function paginaEstatisticas()
    {
        return view('pages.pagina_de_links.estatistica', ['menu' => 'stats']);
    }
}
