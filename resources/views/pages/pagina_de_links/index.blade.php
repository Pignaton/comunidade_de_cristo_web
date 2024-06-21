@extends('layouts.app', ['activePage' => 'pagina_de_links', 'titlePage' => __('Página de Links')])
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
                            <h4 class="card-title">Dias dos Cultos</h4>
                            <p class="card-category">Cultos da semana criados</p>
                        </div>
                        <div class="card-body">
                            <div class="container_area">
                                <div class="container_leftside">
                                    <header>
                                        <ul>
                                            <li @if ($menu == 'links') class="active" @endif><a href="#">Links</a></li>
                                            <li @if ($menu == 'design') class="active" @endif><a
                                                    href="{{url('administrativo/pagina/design')}}">Aparência</a></li>
                                            <li @if ($menu == 'stats') class="active" @endif><a
                                                    href="#">Estatísticas</a></li>
                                        </ul>
                                    </header>
                                    @yield('body')
                                </div>
                                <div class="container_rightside">
                                    <iframe frameborder="0" src="{{url('fique-por-dentro')}}"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
