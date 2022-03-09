<div class="modal fade" id="modalCriaAcesso" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('cria-acesso')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cria Acesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Name input -->
                            <div class="form-outline">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" id="nome" name="nome"
                                       class="form-control"
                                       value="{{ old('nome') }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Email input -->
                            <div class="form-outline">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control"
                                       value="{{ old('email') }}"/>
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="row">
                        <div class="col">
                            <!-- Name input -->
                            <div class="form-outline">
                                <label class="form-label" for="cod_integrante">Integrante</label>
                                <input class="form-control" id="cod_integrante" name="cod_integrante"
                                       list="listaIntegrantes">
                                <datalist id="listaIntegrantes">
                                    @foreach($integrantes as $integrante)
                                        <option value="{{$integrante->cod_integrante}}">{{$integrante->nome}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="nivel">Nivel</label>
                                <select class="custom-select" id="nivel" name="nivel">
                                    <option value="" >Selecione o nivel...</option>
                                    <option value="0">Usuário Comum</option>
                                    <option value="1">Administrador</option>
                                    @if($acesso->nivel === '2')
                                        <option value="2">Desenvolvedor</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center pb-3">
                        <div class="col">
                            <small>Ao criar o usuário, o sistema ira gerar uma senha padrão/ SENHA:
                                Comunidade123</small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Criar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>


