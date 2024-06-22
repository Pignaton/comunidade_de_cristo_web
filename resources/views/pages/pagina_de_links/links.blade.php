@extends('pages.pagina_de_links.index', ['activePage' => 'design', 'titlePage' => __('Página de Design')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
@endsection
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="bigButton btn btn-success" href="{{url('#')}}">Novo Link</a>
                    <ul id="links">
                        @foreach($links as $link)
                            <li class="link--item" data-id="{{$link->cod_links}}">
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
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <script>
        new Sortable(document.querySelector('#links'),{
            animation: 150,
            onEnd: async(e) => {
                let cod_link = e.item.getAttribute('data-id');
                let link = `{{url('administrativo/link-ordem/${cod_link}/${e.newIndex}')}}`;
                await fetch(link);
                window.location.href = window.location.href;
            }
        })
    </script>
@endsection
