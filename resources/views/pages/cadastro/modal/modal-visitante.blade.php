<div class="modal fade" id="modalVisitante{{$pessoa->cod_pessoa}}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{url('/editar-visitante')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Informações do Visitante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cod_pessoa" id="cod_pessoa" value="{{$pessoa->cod_pessoa}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="{{$pessoa->nome}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="idade">Idade</label>
                            <input type="text" class="form-control" name="idade" id="idade" value="{{$pessoa->idade}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{$pessoa->email}}">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" value="{{$pessoa->telefone}}">
                    </div>
                    <div class="form-group row">
                        <div class="bmd-form-group col-md-6">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="masculino"
                                           name="sexo" value="M" @if($pessoa->sexo === 'M') checked @endif >
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                    {{ __('Masculino') }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline mr-auto ml-3 mt-3">
                                <label class="form-check-label ml-3">
                                    <input class="form-check-input" type="checkbox" id="feminino"
                                           name="sexo" value="F" @if($pessoa->sexo === 'F') checked @endif>
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                    {{ __('Feminino') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6 form-inline">
                            <label for="estadocivil" class="ml-3 mr-2">Estado Civil</label>
                            <select name="estadocivil" id="estadocivil" class="selectpicker">
                                <option value="I" @if($pessoa->estado_civil === 'I') selected @endif >Não identificado
                                </option>
                                <option value="S" @if($pessoa->estado_civil === 'S') selected @endif>Solteiro</option>
                                <option value="C" @if($pessoa->estado_civil === 'C') selected @endif>Casado</option>
                                <option value="V" @if($pessoa->estado_civil === 'V') selected @endif>Viúva</option>
                                <option value="A" @if($pessoa->estado_civil === 'A') selected @endif>Separado</option>
                                <option value="D" @if($pessoa->estado_civil === 'D') selected @endif>Divorciado</option>
                                <option value="N" @if($pessoa->estado_civil === 'N') selected @endif>Namorando</option>
                            </select>
                        </div>
                    </div>

                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="cep" class="form-control" id="cep"
                                   placeholder="{{ __('Cep...') }}" value="{{$pessoa->cep}}">
                        </div>
                    </div>
                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="endereco" class="form-control" id="endereco"
                                   placeholder="{{ __('Endereco...') }}" value="{{$pessoa->endereco}}">
                        </div>
                    </div>
                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="bairro" class="form-control" id="bairro"
                                   placeholder="{{ __('Bairro...') }}" value="{{$pessoa->bairro}}">
                        </div>
                    </div>
                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="numero" class="form-control" id="numero"
                                   placeholder="{{ __('Numero...') }}" value="{{$pessoa->numero}}">
                        </div>
                    </div>
                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="complemento" class="form-control" id="complemento"
                                   placeholder="{{ __('Complemento...') }}" value="{{$pessoa->complemento}}">
                        </div>
                    </div>
                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="cidade" class="form-control" id="cidade"
                                   placeholder="{{ __('Cidade...') }}" value="{{$pessoa->cidade}}">
                        </div>
                    </div>
                    <div class="bmd-form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="estado" class="form-control" id="estado"
                                   placeholder="{{ __('Estado...') }}" value="{{$pessoa->estado}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>


