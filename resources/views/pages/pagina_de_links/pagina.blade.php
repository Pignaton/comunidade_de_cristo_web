@extends('layouts.app', ['activePage' => 'pagina', 'titlePage' => __('Página Template')])
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="bigButton btn btn-success" href="{{url('administrativo/pagina/novo/links/'.$cod_pagina)}}">Novo Página</a>
                    <ul id="links">
                        @foreach($paginas as $paginas)
                            <li class="link--item" data-cod_pagina="{{$pagina->cod_pagina}}">
                                <div class="link--item-order">
                                    <i class="material-icons" alt="Ordernar" width="10%">low_priority</i>
                                </div>
                                <div class="link--item-info">
                                    <div class="link--item-title">{{$link->titulo}}</div>
                                    <div class="link--item-href">{{$link->href}}</div>
                                </div>
                                <div class="link--item-bottons">
                                    <a href="">Editar</a>
                                    <a href="">Excluir</a>
                                    <a href="">Desativar</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
