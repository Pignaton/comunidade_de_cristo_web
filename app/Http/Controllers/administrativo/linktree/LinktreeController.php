<?php

namespace App\Http\Controllers\Administrativo\Linktree;


use App\Models\ArquivosLink;
use hisorange\BrowserDetect\Parser as Browser;
use App\Models\Visualizacao;
use App\Models\SiteLogAcesso;
use App\Models\Links;
use App\Models\Pagina;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\NovoLinkRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class LinktreeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function index($slug)
    {
        $pagina = Pagina::where('slug', $slug)->first();

        if ($pagina) {

            $bg = '#FFFFF';
            switch ($pagina->op_bg_value) {
                case 'image' :
                    $bg = "url('" . url(asset('assets')) . 'images/background/' . $pagina->op_bg_value . "')";
                    break;
                case 'color' :
                    $colors = explode(',', $pagina->op_bg_value);
                    $bg = 'linear-gradient(-45deg,';
                    $bg .= $colors[0] . ',';
                    $bg .= !empty($colors[1] ? $colors[1] : $colors[0]);
                    $bg .= ')';
                    break;
            }

            $links = Links::where('cod_pagina', $pagina->cod_pagina)
                ->where('ind_status', '0')
                ->orderBy('ordem', 'ASC')
                ->get();

            $view = Visualizacao::firstOrNew(
                ['cod_pagina' => $pagina->cod_pagina,
                    'visualizacao_data' => date('Y-m-d')
                ]);

            $view->total++;
            $view->save();

            $device = new SiteLogAcesso();
            $device->cod_pagina = $pagina->cod_pagina;
            $device->browser_name = Browser::browserName();
            $device->device_type = Browser::deviceType();
            $device->platform_name = Browser::platformName();
            $device->device_model = Browser::deviceModel();
            $device->user_agent = Browser::userAgent();
            $device->data_acesso = date('Y-m-d H:i:s');
            $device->save();

            return view('pages.linktree.index', [
                'font_color' => $pagina->op_font_color,
                'profile_image' => url(asset('assets') . '/' . $pagina->op_profile_image),
                'titulo' => $pagina->op_title,
                'descricao' => $pagina->op_description,
                'fb_pixel' => $pagina->op_fb_pixel,
                'op_bg_value' => $pagina->op_bg_value,
                'bg' => $bg,
                'links' => $links,

            ]);
        } else {
            return view('errors.404');
        }

    }

    public function agenda($slug)
    {

        $pagina = Pagina::where('slug', $slug)->first();

        $files = ArquivosLink::where([
            'nom_tabela' => 'pages',
            'cod_pk_tabela' => $pagina->cod_pagina
        ])->get();

        foreach ($files as $file) {

            $file->dsc_arquivo = $file->dsc_link_arquivo;

            $file->dsc_link_arquivo = getArquivo(
                $file->dsc_link_arquivo
            );
        }

        return view('pages.linktree.agenda.index', ['files' => $files]);
    }

    public function pagina()
    {
        $paginas = Pagina::all();

        return view('pages.pagina_de_links.pagina
            ', [
            'menu' => 'pagina',
            'paginas' => $paginas,
        ]);

    }

    public function paginaLinks($cod_pagina)
    {
        $links = Links::where('cod_pagina', $cod_pagina)->orderBy('ordem', 'ASC')->get();

        return view('pages.pagina_de_links.links', [
            'menu' => 'links',
            'links' => $links,
            'cod_pagina' => $cod_pagina
        ]);
    }

    public function linkOrdemAtualiza($cod_pagina, $cod_link, $nova_posicao) //$cod_pagina
    {

        $link = Links::find($cod_link);

        $myPages = [];
        $myPagesQuery = Pagina::where('cod_pagina', $cod_pagina)->get();

        foreach ($myPagesQuery as $pageItem) {
            $myPages[] = $pageItem->cod_pagina;
        }

        if (in_array($link->cod_pagina, $myPages)) {
            if ($link->ordem > $nova_posicao) {
                $afterLinks = Links::where('cod_pagina', $cod_pagina)
                    ->where('ordem', '>=', $nova_posicao)
                    ->get();
                foreach ($afterLinks as $afterLink) {
                    $afterLink->ordem++;
                    $afterLink->save();
                }
            } elseif ($link->ordem < $nova_posicao) {
                $beforeLinks = Links::where('cod_pagina', $cod_pagina)
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
                ->orderBy('ordem', 'ASC')
                ->get();
            foreach ($allLinks as $linkKey => $linkItem) {
                $linkItem->ordem = $linkKey;
                $linkItem->save();
            }
        }
        return [];
    }

    public function novoLink($cod_pagina)
    {
        $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();
        if ($pagina) {
            return view('pages.pagina_de_links.pagina_edita_link', [
                'menu' => 'links',
                'pagina' => $pagina,
                'cod_pagina' => $cod_pagina
            ]);
        }
    }

    public function novoLinkAcao(NovoLinkRequest $request)
    {

        $pagina = Pagina::where('cod_pagina', $request->cod_pagina)->first();
        if ($pagina) {
            $totalLinks = Links::where('cod_pagina', $pagina->cod_pagina)->count();

            $novoLink = new Links();
            $novoLink->cod_pagina = $request->cod_pagina;
            $novoLink->ind_status = $request->ind_status;
            $novoLink->ordem = $totalLinks;
            $novoLink->titulo = $request->titulo;
            $novoLink->href = $request->href;
            $novoLink->op_bg_color = $request->op_bg_color;
            $novoLink->op_text_color = $request->op_text_color;
            $novoLink->op_border_type = $request->op_border_color;
            $novoLink->save();


            return redirect('/administrativo/pagina/links/' . $request->cod_pagina);

        } else {
            return redirect('/administrativo/paginas');
        }
    }

    public function editaLink($cod_pagina, $cod_link)
    {
        $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();

        if ($pagina) {
            $link = Links::where('cod_pagina', $cod_pagina)->where('cod_links', $cod_link)->first();
            if ($link) {
                return view('pages.pagina_de_links.pagina_edita_link', [
                    'menu' => 'links',
                    'pagina' => $pagina,
                    'cod_pagina' => $cod_pagina,
                    'link' => $link
                ]);
            }

        }
        return view('pages.pagina_de_links.links');
    }

    public function editaLinkAcao(NovoLinkRequest $request, $cod_pagina, $cod_link)
    {
        $file = ArquivosLink::where(['cod_pk_tabela' => $cod_pagina, 'nom_tabela' => strtolower('pages')])->first();

        if (!is_null($file)) {
            $file->drop();
            $file->delete();
        }

        save_file($request->applications, '', 'pages', $cod_pagina);

        $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();

        if ($pagina) {
            $link = Links::where('cod_pagina', $cod_pagina)->where('cod_links', $cod_link)->first();
            if ($link) {
                $link->ind_status = $request->ind_status;
                $link->titulo = $request->titulo;
                $link->href = $request->href;
                $link->op_bg_color = $request->op_bg_color;
                $link->op_text_color = $request->op_text_color;
                $link->op_border_type = $request->op_border_color;
                $link->save();

                return redirect('/administrativo/pagina/links/' . $request->cod_pagina);
            }

        } else {
            return redirect('/administrativo/paginas');
        }
    }

    public function deletaLink($cod_pagina, $cod_link)
    {
        $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();

        if ($pagina) {
            $link = Links::where('cod_pagina', $cod_pagina)->where('cod_links', $cod_link)->first();
            if ($link) {

                $link->delete();

                $allLinks = Links::where('cod_pagina', $link->cod_pagina)
                    ->orderBy('ordem', 'ASC')
                    ->get();
                foreach ($allLinks as $linkKey => $linkItem) {
                    $linkItem->ordem = $linkKey;
                    $linkItem->save();
                }

                return redirect('/administrativo/pagina/links/' . $cod_pagina);
            }

        }
        return redirect('/administrativo/paginas');
    }

    public function paginaDesign($cod_pagina)
    {
        //$links = Links::where('cod_pagina', $cod_pagina)->orderBy('ordem', 'ASC')->get();
        $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();

        if ($pagina) {
            return view('pages.pagina_de_links.design', [
                'menu' => 'design',
                'pagina' => $pagina,
                'cod_pagina' => $cod_pagina,

            ]);
        }


        return view('pages.pagina_de_links.pagina');
    }

    /* public function DesignLink($cod_pagina, $cod_link)
     {
         $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();

         if ($pagina) {
             $link = Links::where('cod_pagina', $cod_pagina)->where('cod_links', $cod_link)->first();
             if ($link) {
                 return view('pages.pagina_de_links.pagina_edita_link', [
                     'menu' => 'links',
                     'pagina' => $pagina,
                     'cod_pagina' => $cod_pagina,
                     'link' => $link
                 ]);
             }

         }
         return view('pages.pagina_de_links.links');
     }*/

    public function editaDesignAcao(Request $request, $cod_pagina)
    {

        $pagina = Pagina::where('cod_pagina', $cod_pagina)->first();

        if ($pagina) {

            $pagina->ind_status_pagina = $request->ind_status_pagina;
            $pagina->op_title = $request->op_title;
            $pagina->op_description = $request->op_description;
            $pagina->slug = $request->slug;
            $pagina->op_bg_value = $request->op_bg_value;
            $pagina->op_font_color = $request->op_font_color;
            $pagina->save();

            return redirect('/administrativo/pagina/design/' . $cod_pagina);


        } else {
            return redirect('/administrativo/paginas');
        }
    }

    public function paginaEstatisticas()
    {
        return view('pages.pagina_de_links.estatistica', ['menu' => 'stats']);
    }

    public function destroy(Request $request)
    {
        try {

            DB::beginTransaction();

            $file = \App\Models\ArquivosLink::where([
                'dsc_link_arquivo' => $request->cod_link_arquivo,
                'nom_tabela' => 'g_banner',
                'cod_pk_tabela' => $request->cod_banner
            ])->first();

            if (is_null($file))
                abort(404, 'Arquivo não encontrado!');

            $file->drop();

            $file->delete();

            DB::commit();

            return response()->json([]);

        } catch (\Exception $error) {

            DB::rollBack();

            return responseError($error, 'Ops...');

        }
    }
}
