@extends('layouts.app', ['activePage' => 'visitantes', 'titlePage' => __('Visitantes')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (session('sucesso'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    {{ session('sucesso') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Visitantes Cadastrados</h4>
                    <p class="card-category"></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table" id="visitantes">
                                <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th>Idade</th>
                                    <th>Sexo</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pessoas as $pessoa)
                                    <tr>
                                        <td class="text-center">{{$pessoa->nome}}</td>
                                        <td>{{$pessoa->idade}}</td>
                                        <td>@switch($pessoa->sexo)
                                                @case('F')
                                                Feminino
                                                @break
                                                @case('M')
                                                Masculino
                                                @break
                                                @default
                                                Não Indentificado
                                            @endswitch
                                        </td>
                                        <td>{{$pessoa->email}}</td>
                                        <td class="td-actions text-right">
                                        <!--<button type="button" rel="tooltip" class="btn btn-info"
                                                    data-original-title="Informações do visitante"
                                                    title="Informações do visitante" data-toggle="modal"
                                                    data-target="#modalVisitante{{--$pessoa->cod_pessoa--}}">
                                                <i class="material-icons">person</i>
                                                <div class="ripple-container"></div>
                                            </button>-->
                                            <a href="{{url('informacao-visitante', ['cod_pessoa' => $pessoa->cod_pessoa])}}"
                                               rel="tooltip" class="btn btn-info"
                                               data-original-title="Informações do visitante"
                                               title="Informações do visitante" class="ripple-container">
                                                <i class="material-icons">person</i>
                                            </a>
                                            <button type="button" rel="tooltip" class="btn btn-success"
                                                    data-original-title="Editar Visitante" title="Editar Visitante"
                                                    data-toggle="modal"
                                                    data-target="#modalVisitante{{$pessoa->cod_pessoa}}">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="Deletar" title="Deletar" onclick="desativaVisitante({{$pessoa->cod_pessoa}})">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages.cadastro.modal.modal-visitante')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




