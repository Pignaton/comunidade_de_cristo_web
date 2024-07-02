@extends('layouts.app', ['activePage' => 'pagina', 'titlePage' => __('Página de Links')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Links</h4>
                            <!--<p class="card-category">Cultos da semana criados</p>-->
                        </div>
                        <div class="card-body">
                            <div class="container_area">
                                <div class="container_leftside">
                                    <header>
                                        <ul>
                                            <li @if ($menu == 'links') class="active" @endif>
                                                <a href="{{url('administrativo/pagina/links/'.$cod_pagina)}}">Links</a>
                                            </li>
                                            <li @if ($menu == 'design') class="active" @endif>
                                                <a href="{{url('administrativo/pagina/design/'.$cod_pagina)}}">Aparência</a>
                                            </li>
                                            <li @if ($menu == 'stats') class="active" @endif>
                                                <a href="#">Estatísticas</a>
                                            </li>
                                        </ul>
                                    </header>
                                    @yield('body')
                                </div>
                                <div class="container_rightside colderecha">
                                    <div class="video-wrapper">
                                        <iframe frameborder="0" src="{{url('fique-por-dentro')}}"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @if($activePage == 'design' || $activePage == 'link' || $activePage == 'pagina')
            <div class="container-qrcode">
                <div class="container d-flex justify-content-center">
                    <button class="btn btn-primary font-weight-bold animate-up-2 solomobile"
                            style="display: none; float: left; margin-left: 12px;">
                        <i class="material-icons" alt="Ordernar" style="margin: 6px !important;">qr_code_2</i>
                    </button>
                    <!-- <button class="btn btn-primary font-weight-bold animate-up-2"
                             style="width: 139px; float: right; margin-right: -4px;"> Continue
                         <i class="material-icons" style="margin: 6px !important;">arrow_forward</i>
                     </button>-->
                </div>
            </div>
        @endif
    @endsection

