<div class="modal fade" id="modalCriaCulto" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cria Culto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('criaCulto')}}">
                @csrf
                <div class="modal-body">
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
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nomeCulto">Nome do culto</label>
                            <input type="text" class="form-control" name="nomeCulto" id="nomeCulto" list="listaCulto" value="{{old('nomeCulto')}}">
                            <datalist id="listaCulto">
                                @foreach($cultos as $culto)
                                    <option value="{{$culto->nom_culto}}">{{$culto->nom_culto}}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="diaCulto">Dia do Culto</label>
                            <select class="form-control" name="diaCulto">
                                <option value="">Selecione...</option>
                                <option value="S">Segunda-feira</option>
                                <option value="T">Terça-feira</option>
                                <option value="Q">Quarta-feira</option>
                                <option value="U">Quinta-feira</option>
                                <option value="B">Sexta-feira</option>
                                <option value="A">Sábado</option>
                                <option value="D">Domingo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="periodo">Periodo</label>
                            <select class="form-control bootstrap-select" name="periodo">
                                <option value="">Selecione Periodo...</option>
                                <option value="M">Manhã</option>
                                <option value="T">Tarde</option>
                                <option value="N">Noite</option>
                                <option value="I">Integral</option>
                            </select>
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


