@extends('layouts.app', ['activePage' => 'visitantes', 'titlePage' => __('Informação do Visitante')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Informação do Visitantes</h4>
                    <p class="card-category"></p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" value="{{$pessoas->nome}}"
                                           readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="idade">Idade</label>
                                    <input type="text" class="form-control" id="idade" value="{{$pessoas->idade}}"
                                           readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{$pessoas->email}}"
                                           readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" value="{{$pessoas->telefone}}"
                                           readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="bmd-form-group col-md-6">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="masculino"
                                                   name="sexo" value="M" @if($pessoas->sexo === 'M') checked @endif >
                                            <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                            {{ __('Masculino') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-auto ml-3 mt-3">
                                        <label class="form-check-label ml-3">
                                            <input class="form-check-input" type="checkbox" id="feminino"
                                                   name="sexo" value="F" @if($pessoas->sexo === 'F') checked @endif>
                                            <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                            {{ __('Feminino') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 form-inline">
                                    <label for="estadocivil" class="ml-3 mr-2">Estado Civil</label>
                                    <select name="estadocivil" id="estadocivil" class="form-control" readonly>
                                        <option value="I" @if($pessoas->estado_civil === 'I') selected @endif >Não
                                            identificado
                                        </option>
                                        <option value="S" @if($pessoas->estado_civil === 'S') selected @endif>Solteiro
                                        </option>
                                        <option value="C" @if($pessoas->estado_civil === 'C') selected @endif>Casado
                                        </option>
                                        <option value="V" @if($pessoas->estado_civil === 'V') selected @endif>Viúva
                                        </option>
                                        <option value="A" @if($pessoas->estado_civil === 'A') selected @endif>Separado
                                        </option>
                                        <option value="D" @if($pessoas->estado_civil === 'D') selected @endif>
                                            Divorciado
                                        </option>
                                        <option value="N" @if($pessoas->estado_civil === 'N') selected @endif>
                                            Namorando
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" id="endereco"
                                           @if ($pessoas->cep !== null)
                                           value="{{$pessoas->endereco . ', ' . $pessoas->numero . ' - ' . $pessoas->bairro . ', ' .
                                        $pessoas->cidade . ' - ' . $pessoas->estado . ' - ' . $pessoas->complemento }}"
                                           @else value="Não Informado" @endif readonly>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="form-group col-md-12">
                                    @if(!empty($pessoas->cep) || !empty($pessoas->bairro))
                                        <iframe
                                            width="100%"
                                            height="450"
                                            style="border:0"
                                            loading="lazy"
                                            allowfullscreen
                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCWcTF9Zpz6w6xu-4pGIfES9-02KRYtnMc&q=
                                    @if(!empty($pessoas->cep)) {{$pessoas->bairro}}?{{$pessoas->endereco}}?{{$pessoas->numero}} @else {{$pessoa->bairro}} @endif">
                                        </iframe>
                                    @else
                                        <div></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">PG indicados para esse visitante</h4>
                            <p class="card-category"></p>
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                <p class="text-center mt-3 font-weight-bold">EM FASE DE IMPLEMENTAÇÃO</p>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
