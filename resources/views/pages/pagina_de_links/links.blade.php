@extends('pages.pagina_de_links.index', ['activePage' => 'pagina', 'titlePage' => __('Página de Links')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
@endsection
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="bigButton btn btn-success"
                       href="{{url('administrativo/pagina/novo/links/'.$cod_pagina)}}">Novo Link</a>
                    <ul id="links">
                        @foreach($links as $link)
                            <li class="link--item" data-id="{{$link->cod_links}}"
                                data-cod_pagina="{{$link->cod_pagina}}">
                                <div class="link--item-order">
                                    <i class="material-icons" alt="Ordernar" width="10%">low_priority</i>
                                </div>
                                <div class="link--item-info">
                                    <div class="link--item-title">{{$link->titulo}} <span
                                            class="badge badge-{{$link->ind_status === 0 ? 'success' : 'danger' }}">{{$link->ind_status === 0? 'Ativo': 'Inativo'}}</span>
                                    </div>
                                    <div class="link--item-href">{{$link->href}}</div>
                                </div>
                                <div class="link--item-bottons">
                                    <a href="{{url('administrativo/pagina/edita/link/'.$cod_pagina.'/'. $link->cod_links)}}">Editar</a>
                                    <a href="">Excluir</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="previewmobile" style="display:none;">
        <div class="btnclosepreview"
             style="background: rgb(60, 66, 69); padding: 12px; text-align: center; margin: 0px auto; color: rgb(255, 255, 255); cursor: pointer;">
            <a><i class="material-icons mr-2">cancel</i>
                Fechar</a>
        </div>
        <div class="sc-gJqsIT" style="width: 90%; margin: 15px auto; position: relative; display: flex;">
            <a class="nav-link text-center las2tabs selected_las2tabs"
               style="background: rgb(255, 255, 255); padding: 0.5rem; border: 2px solid rgb(243, 247, 250); border-radius: 5px; line-height: 32px; width: 100%;">
                <i class="material-icons mr-2">smartphone</i>Preview Page</a>
        </div>
        <div class="container_rightside previewmobile_2">
            <div class="video-wrapper">
                <iframe frameborder="0" src="{{url('fique-por-dentro')}}"></iframe>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
        <script>
            $(".solomobile").on('click', function () {
                $('.previewmobile').css('display', 'block');
            })
            $(".btnclosepreview").on('click', function () {
                $('.previewmobile').css('display', 'none');
            })

            new Sortable(document.querySelector('#links'), {
                animation: 150,
                onEnd: async (e) => {
                    let cod_link = e.item.getAttribute('data-id');
                    let cod_pagina = e.item.getAttribute('data-cod_pagina');
                    let link = `{{url('administrativo/link-ordem/${cod_pagina}/${cod_link}/${e.newIndex}')}}`;
                    await fetch(link);
                    window.location.href = window.location.href;
                }
            })

        </script>
    @endpush
@endsection
