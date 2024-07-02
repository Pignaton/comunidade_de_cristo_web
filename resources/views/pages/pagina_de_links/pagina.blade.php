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
                            <h4 class="card-title">Páginas</h4>
                            <!--<p class="card-category">Cultos da semana criados</p>-->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="links">
                                        @foreach($paginas as $pagina)
                                            <li class="link--item" data-cod_pagina="{{$pagina->cod_pagina}}">
                                                <div class="link--item-info">
                                                    <div class="link--item-title">{{$pagina->op_title}}</div>
                                                    <div class="pl-2 link--item-href">{{$pagina->op_description}}</div>
                                                </div>
                                                <div class="link--item-bottons">
                                                    <a href="{{url('administrativo/pagina/links/'.$pagina->cod_pagina)}}">Acessar</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
