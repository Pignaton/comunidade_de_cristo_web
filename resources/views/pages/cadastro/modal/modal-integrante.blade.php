<div class="modal fade" id="modalIntegrante{{$integrante->cod_integrante}}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informações do Integrante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" value="{{$integrante->nome}}" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="idade">Idade</label>
                        <input type="text" class="form-control" id="idade" value="{{$integrante->idade}}" readonly>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="{{$integrante->email}}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="masculino"
                                       name="sexo" value="M" @if($integrante->ind_sexo === 'M') checked @endif disabled>
                                <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                {{ __('Masculino') }}
                            </label>
                        </div>
                        <div class="form-check form-check-inline mr-auto ml-3 mt-3">
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="checkbox" id="feminino"
                                       name="sexo" value="F" @if($integrante->ind_sexo === 'F') checked @endif disabled>
                                <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                {{ __('Feminino') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-check-inline">
                            <label class="form-label" for="estadocivil">Estado Civil </label>
                            <select name="estadocivil" id="estadocivil" class="form-control" readonly>
                                <option value="I" @if($integrante->estado_civil === 'I') selected @endif >Não
                                    identificado
                                </option>
                                <option value="S" @if($integrante->estado_civil === 'S') selected @endif>Solteiro
                                </option>
                                <option value="C" @if($integrante->estado_civil === 'C') selected @endif>Casado
                                </option>
                                <option value="V" @if($integrante->estado_civil === 'V') selected @endif>Viúva
                                </option>
                                <option value="A" @if($integrante->estado_civil === 'A') selected @endif>Separado
                                </option>
                                <option value="D" @if($integrante->estado_civil === 'D') selected @endif>
                                    Divorciado
                                </option>
                                <option value="N" @if($integrante->estado_civil === 'N') selected @endif>Namorando
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


