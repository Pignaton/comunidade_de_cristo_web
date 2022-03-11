@extends('layouts.app', ['activePage' => 'acessos', 'titlePage' => __('Acessos')])
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
                    <h4 class="card-title">Acessos Cadastrados</h4>
                    <p class="card-category"></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="justify-content-between">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#modalCriaAcesso">Criar Acesso
                                </button>
                            </div>
                            <table class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">usuario</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Nivel de Acesso</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($acessos as $acesso)
                                    <tr>
                                        <td class="text-right"></td>
                                        <td class="text-center">{{$acesso->nome}}</td>
                                        <td class="text-center">{{$acesso->usuario}}</td>
                                        <td class="text-center">{{$acesso->email}}</td>
                                        <td class="text-center">{{$acesso->nivel}}</td>
                                        <td class="text-center">@switch($acesso->status)
                                                @case('A')
                                                Ativo
                                                @break
                                                @case('I')
                                                Inativo
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-success btn-sm"
                                                    data-original-title="Editar Acesso" title="Editar Acesso"
                                                    data-toggle="modal"
                                                    data-target="#modalAcesso{{$acesso->cod_usuario}}"
                                                    @if(auth()->user()->cod_usuario === $acesso->cod_usuario) disabled @endif>
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <button type="button" rel="tooltip"
                                                    class="btn btn-danger btn-sm"
                                                    data-original-title="Deletar" title="Deletar"
                                                    onclick="deletaUsuario({{$acesso->cod_usuario}})"
                                                    @if(auth()->user()->cod_usuario === $acesso->cod_usuario) disabled @endif>
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages/cadastro/modal/modal-edita-acesso')
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
@section('modal')
    @include('pages/cadastro/modal/modal-criar-acesso')
@endsection




