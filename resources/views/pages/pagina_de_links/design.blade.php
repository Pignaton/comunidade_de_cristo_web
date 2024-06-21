@extends('pages.pagina_de_links.index', ['activePage' => 'design', 'titlePage' => __('Página de Design')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
@endsection
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Olá design
                </div>
            </div>
        </div>
    </div>
@endsection
