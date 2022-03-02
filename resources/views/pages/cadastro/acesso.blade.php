@extends('layouts.app', ['activePage' => 'acessos', 'titlePage' => __('Acessos')])
@section('content')
    <div class="content">
        <div class="container-fluid">
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
                                    <th>usuario</th>
                                    <th>Email</th>
                                    <th>Nivel de Acesso</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($acessos as $acesso)
                                    <tr>
                                        <td class="text-center">{{$acesso->nome}}</td>
                                        <td>{{$acesso->usuario}}</td>
                                        <td>{{$acesso->email}}</td>
                                        <td>{{$acesso->nivel}}</td>
                                        <td>@switch($acesso->status)
                                                @case('A')
                                                Ativo
                                                @break
                                                @case('I')
                                                Inativo
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-success"
                                                    data-original-title="Editar Acesso" title="Editar Acesso"
                                            data-toggle="modal" data-target="#modalAcesso{{$acesso->cod_usuario}}">
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




