@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Igreja Batista Comunidade de Cristo')])
@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                @if (isset($_GET['sucesso']))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        Cadastro realizado com sucesso
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form" method="POST" action="{{ route('cadastroPessoa') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title"><strong>{{ __('Cadastro') }}</strong></h4>
                            <div class="social-line">

                            </div>
                        </div>
                        <div class="card-body ">
                            <p class="card-description text-center">{{ __('Campos com * obrigátorio') }}</p>
                            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">face</i>
                                      </span>
                                    </div>
                                    <input type="text" name="nome" class="form-control"
                                           placeholder="{{ __('Nome...') }}" value="{{ old('nome') }}" required>
                                </div>
                                @if ($errors->has('nome'))
                                    <div id="name-error" class="error text-danger pl-3" for="nome"
                                         style="display: block;">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('idade') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">face</i>
                                      </span>
                                    </div>
                                    <input type="text" name="idade" class="form-control"
                                           placeholder="{{ __('Idade...') }}" value="{{ old('idade') }}" required>
                                </div>
                                @if ($errors->has('name'))
                                    <div id="idade-error" class="error text-danger pl-3" for="idade"
                                         style="display: block;">
                                        <strong>{{ $errors->first('idade') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                      </span>
                                    </div>
                                    <input type="email" name="email" class="form-control"
                                           placeholder="{{ __('Email...') }}" value="{{ old('email') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pl-3" for="email"
                                         style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('telefone') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">phone_iphone</i>
                                      </span>
                                    </div>
                                    <input type="phone" name="telefone" id="telefone" class="form-control"
                                           placeholder="{{ __('Telefone...') }}">
                                </div>
                                @if ($errors->has('telefone'))
                                    <div id="telefone-error" class="error text-danger pl-3" for="telefone"
                                         style="display: block;">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('estadocivil') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">person</i>
                                      </span>
                                    </div>
                                    <select name="estadocivil" id="estadocivil"
                                            class="form-control">
                                        <option value="I">Selecione...</option>
                                        <option value="S">Solteiro</option>
                                        <option value="C">Casado</option>
                                        <option value="V">Viúva</option>
                                        <option value="A">Separado</option>
                                        <option value="D">Divorciado</option>
                                        <option value="N">Namorando</option>
                                    </select>
                                </div>
                                @if ($errors->has('telefone'))
                                    <div id="estadocivil-error" class="error text-danger pl-3" for="estadocivil"
                                         style="display: block;">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-check form-check-inline mr-auto ml-3 mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="masculino"
                                           name="sexo" value="M">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                    {{ __('Masculino') }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline mr-auto ml-3 mt-3">
                                <label class="form-check-label ml-3">
                                    <input class="form-check-input" type="checkbox" id="feminino"
                                           name="sexo" value="F">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                    {{ __('Feminino') }}
                                </label>
                            </div>
                            @foreach($statusCampo as $status)
                                @if($status->status === '1' && $status->nom_campo == 'culto')
                                    <div class="bmd-form-group{{ $errors->has('culto') ? ' has-danger' : '' }} mt-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">other_houses</i>
                                      </span>
                                            </div>
                                            <select name="culto" id="culto"
                                                    class="form-control" required>
                                                <option value="">Selecione...</option>
                                                @foreach($listaCulto as $culto)
                                                    <option
                                                        value="{{$culto->cod_culto}}">
                                                        {{$culto->nom_culto . ' - ' . diaCulto($culto->dia_culto) . ' - ' . periodoCulto($culto->ind_periodo)}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('culto'))
                                            <div id="culto-error" class="error text-danger pl-3" for="culto"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('culto') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                            @foreach($statusCampo as $status)
                                @if($status->status === '1' && $status->nom_campo == 'campanha')
                                    <div class="bmd-form-group{{ $errors->has('campanha') ? ' has-danger' : '' }} mt-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">other_houses</i>
                                      </span>
                                            </div>
                                            <select name="campanha" id="campanha"
                                                    class="form-control" required>
                                                <option value="">Selecione a campanha...</option>
                                                @foreach($campanhas as $campanha)
                                                    <option
                                                        value="{{$campanha->cod_campanha}}">{{$campanha->nom_campanha}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('campanha'))
                                            <div id="campanha-error" class="error text-danger pl-3" for="campanha"
                                                 style="display: block;">
                                                <strong>{{ $errors->first('campanha') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach


                            <div class="card-login card-hidden mb-3 mt-4">
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title"><strong>{{ __('Endereço') }}</strong></h4>
                                    <div class="social-line">

                                    </div>
                                </div>
                            </div>

                            <div class="bmd-form-group{{ $errors->has('cep') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">code</i>
                                      </span>
                                    </div>
                                    <input type="text" name="cep" class="form-control" id="cep"
                                           placeholder="{{ __('Cep...') }}" value="{{ old('cep') }}">
                                </div>
                                @if ($errors->has('cep'))
                                    <div id="cep-error" class="error text-danger pl-3" for="cep"
                                         style="display: block;">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('endereco') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">home</i>
                                      </span>
                                    </div>
                                    <input type="text" name="endereco" class="form-control" id="endereco"
                                           placeholder="{{ __('Endereco...') }}" value="{{ old('endereco') }}">
                                </div>
                                @if ($errors->has('endereco'))
                                    <div id="endereco-error" class="error text-danger pl-3" for="endereco"
                                         style="display: block;">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('bairro') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">face</i>
                                      </span>
                                    </div>
                                    <input type="text" name="bairro" class="form-control" id="bairro"
                                           placeholder="{{ __('Bairro...') }}" value="{{ old('bairro') }}">
                                </div>
                                @if ($errors->has('bairro'))
                                    <div id="bairro-error" class="error text-danger pl-3" for="bairro"
                                         style="display: block;">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('numero') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">numbers</i>
                                      </span>
                                    </div>
                                    <input type="text" name="numero" class="form-control" id="numero"
                                           placeholder="{{ __('Numero...') }}" value="{{ old('numero') }}">
                                </div>
                                @if ($errors->has('numero'))
                                    <div id="numero-error" class="error text-danger pl-3" for="numero"
                                         style="display: block;">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('complemento') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">store</i>
                                      </span>
                                    </div>
                                    <input type="text" name="complemento" class="form-control" id="complemento"
                                           placeholder="{{ __('Complemento...') }}" value="{{ old('complemento') }}">
                                </div>
                                @if ($errors->has('complemento'))
                                    <div id="complemento-error" class="error text-danger pl-3" for="complemento"
                                         style="display: block;">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('cidade') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">location_city</i>
                                      </span>
                                    </div>
                                    <input type="text" name="cidade" class="form-control" id="cidade"
                                           placeholder="{{ __('Cidade...') }}" value="">
                                </div>
                                @if ($errors->has('cidade'))
                                    <div id="cidade-error" class="error text-danger pl-3" for="cidade"
                                         style="display: block;">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('estado') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">location_city</i>
                                      </span>
                                    </div>
                                    <input type="text" name="estado" class="form-control" id="estado"
                                           placeholder="{{ __('Estado...') }}" value="{{ old('estado') }}">
                                </div>
                                @if ($errors->has('estado'))
                                    <div id="estado-error" class="error text-danger pl-3" for="estado"
                                         style="display: block;">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit"
                                    class="btn btn-primary btn-link btn-lg">{{ __('Registrar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

