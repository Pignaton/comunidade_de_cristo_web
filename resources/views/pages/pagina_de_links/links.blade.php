@extends('pages.pagina_de_links.index', ['activePage' => 'design', 'titlePage' => __('Página de Design')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
@endsection
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="bigButton" href="{{url('#')}}">Novo Link</a>
                    <ul id="links">
                        @foreach($links as $link)
                            <li class="link-item">
                                <div class="link--item-order">
                                    <img src="" alt="Ordernar" width="10%">
                                </div>
                                <div class="link--item-info">
                                    <div class="link--item-title">{{$link->titulo}}</div>
                                    <div class="link--item-href">{{$link->href}}</div>
                                </div>
                                <div class="link--item-bottons">
                                    <a href="" class="link--item-title">Editar</a>
                                    <a href="" class="link--item-href">Excluir</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
