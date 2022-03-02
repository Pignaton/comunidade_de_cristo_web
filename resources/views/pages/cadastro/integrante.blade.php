@extends('layouts.app', ['activePage' => 'integrantes', 'titlePage' => __('Integrante')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Integrantes Cadastrados</h4>
                    <p class="card-category"></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table" id="integrante">
                                <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th>Idade</th>
                                    <th>Sexo</th>
                                    <th>Email</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($integrantes as $integrante)
                                    <tr>
                                        <td class="text-center">{{$integrante->nome}}</td>
                                        <td>{{$integrante->idade}}</td>
                                        <td>@switch($integrante->ind_sexo)
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
                                        <td>{{$integrante->email}}</td>
                                        <td>{{convertDataBR($integrante->data_nascimento)}}</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-info"
                                                    data-original-title="Informações do visitante"
                                                    title="Informações do visitante" data-toggle="modal"
                                                    data-target="#modalIntegrante{{$integrante->cod_integrante}}">
                                                <i class="material-icons">person</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-success"
                                                    data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="" title="">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages/cadastro/modal/modal-integrante')
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
