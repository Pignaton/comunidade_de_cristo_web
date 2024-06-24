@extends('pages.pagina_de_links.index', ['activePage' => 'design', 'titlePage' => __('Página de Design')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
@endsection
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Criar Novo Link</h4>
                    <p class="card-category"></p>
                </div>
                <form method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="ind_status" class="mt-2">Status</label>
                                        <select name="ind_status" id="ind_status" class="custom-select">
                                            <option value="0" @if($pagina->ind_status === '0') selected @endif>Ativo
                                            </option>
                                            <option value="1" @if($pagina->ind_status === '1') selected @endif>Inativo
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="titulo" class="mt-2">Título do Link</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                               value="{{$pagina->titulo}}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="href" class="mt-2">URL do link</label>
                                        <input type="text" class="form-control" id="href" name="href"
                                               value="{{$pagina->href}}">
                                    </div>


                                    <div class="col-md-12">
                                        <label for="op_bg_color" class="mt-2">Cor de Fundo</label>
                                        <input type="color" class="form-control" id="op_bg_color" name="op_bg_color"
                                               value="{{$pagina->op_bg_color?:'#FFFFFF'}}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="op_text_color">Cor do Texto</label>
                                        <input type="color" class="form-control" id="op_text_color"
                                               name="op_text_color"
                                               value="{{$pagina->op_text_color?:'#000000'}}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="op_border_type" class="form-label mt-2">Tipo de Borda</label>
                                        <select name="op_border_type" id="op_border_type"
                                                class="custom-select">
                                            <option value="I" @if($pagina->op_border_type === '1') selected @endif >
                                                Quadrado
                                            </option>
                                            <option value="S" @if($pagina->op_border_type === '2') selected @endif>
                                                Arredondado
                                            </option>
                                            <option value="S" @if($pagina->op_border_type === '3') selected @endif>
                                                Contorno
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label for="btnSalvar">&nbsp;</label>
                                        <button type="submit" id="btnSalvar" class="form-control btn btn-success">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
