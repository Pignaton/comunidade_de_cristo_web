@extends('layouts.app', ['activePage' => 'configuracoes-de-cadastro', 'titlePage' => __('Configurações de Cadastro')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (session('culto'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    {{ session('culto') }}
                </div>
            @endif
            @if (session('campanha'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    {{ session('campanha') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Dias dos Cultos</h4>
                            <p class="card-category">Cultos da semana criados</p>
                        </div>
                        <div class="card-body">
                            <div class="btn-group d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#modalCriaCulto">Criar Culto
                                </button>
                                @foreach($statusCampo as $status)
                                    @if($status->nom_campo === 'culto')
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" id="toggleCulto"
                                                       @if($status->status === '1') checked @endif >
                                                <span class="toggle"></span>
                                                Exibir culto no formulario de cadastro
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <table class="table" id="tableculto">
                                <thead>
                                <tr>
                                    <th class="text-center">Nome do culto</th>
                                    <th>Dia do Culto</th>
                                    <th>Periodo</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cultos as $culto)
                                    <tr>
                                        <td class="text-center">{{$culto->nom_culto}}</td>
                                        <td>{{diaCulto($culto->dia_culto)}}</td>
                                        <td>{{periodoCulto($culto->ind_periodo)}}</td>
                                        <td>@switch($culto->status)
                                                @case('A')
                                                Ativo
                                                @break
                                                @case('I')
                                                Inativo
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="td-actions text-right justify-content-between">
                                           <button type="button" rel="tooltip" class="btn btn-info"
                                                    data-original-title="Desativa ou ativa Culto" title="Desativa ou ativa Culto"
                                                    onclick="desativaeAtivaCulto({{$culto->cod_culto}}, '{{$culto->status}}')">
                                                <i class="material-icons">disabled_visible</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-success"
                                                    data-original-title="Editar Acesso" title="Editar Acesso"
                                                    data-toggle="modal"
                                                    data-target="#modalEditaCulto{{$culto->cod_culto}}">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="Deletar" title="Deletar" onclick="deletaCulto({{$culto->cod_culto}})">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages/configuracoes/modal/modal-edita-culto')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Campanhas</h4>
                            <p class="card-category">Campanhas criadas</p>
                        </div>
                        <div class="card-body">
                            <div class="btn-group d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#modalCriaCampanha">Criar
                                    Campanha
                                </button>
                                @foreach($statusCampo as $status)
                                    @if($status->nom_campo === 'campanha')
                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" id="toggleCampanha"
                                                       @if($status->status === '1') checked @endif>
                                                <span class="toggle"></span>
                                                Exibir culto no formulario de cadastro
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Código Culto</th>
                                    <th>Nome da Campanha</th>
                                    <th>Criado em</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campanhas as $campanha)
                                    <tr>
                                        <td class="text-center">{{$campanha->cod_culto}}</td>
                                        <td>{{$campanha->nom_campanha}}</td>
                                        <td>{{convertDataBR($campanha->created_at)}}</td>
                                        <td>@switch($campanha->status)
                                                @case('A')
                                                Ativo
                                                @break
                                                @case('I')
                                                Inativo
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-info"
                                                    data-original-title="Desativa ou ativa Culto" title="Desativa ou ativa Culto"
                                                    onclick="desativaeAtivaCampanha({{$campanha->cod_campanha}}, '{{$campanha->status}}')">
                                                <i class="material-icons">disabled_visible</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-success"
                                                    data-original-title="Editar Acesso" title="Editar Acesso"
                                                    data-toggle="modal"
                                                    data-target="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="Deletar" title="Deletar">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages/configuracoes/modal/modal-edita-culto')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages/configuracoes/modal/modal-cria-culto')
    @include('pages/configuracoes/modal/modal-cria-campanha')
@endsection





