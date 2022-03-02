<div class="modal fade" id="modalAcesso{{$acesso->cod_usuario}}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Configurar Acesso do Usuario - {{$acesso->nome}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idade">Nivel de Acesso</label>
                        <select class="form-control" id="nivelAcesso">
                            <option valeu="0" @if($acesso->nivel === '0') selected @endif>Usuario Comum</option>
                            <option valeu="1" @if($acesso->nivel === '1') selected @endif>Administrador</option>
                            @if($acesso->nivel === '2')
                                <option valeu="2" @if($acesso->nivel === '2') selected @endif>Desenvolvedor</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" @if($acesso->status === 'A') checked @endif>
                                <span class="toggle"></span>
                                Ativar ou Desativar Usuário
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-warning" id="btnResetarSenha">Resetar Senha</button>
                    <small class="form-text text-muted">Reseta a senha do usuário para o padrão 123</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


