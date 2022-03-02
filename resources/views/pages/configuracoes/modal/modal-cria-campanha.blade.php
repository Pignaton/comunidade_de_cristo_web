<div class="modal fade" id="modalCriaCampanha" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cria Culto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('criaCampanha')}}">
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
                            <label for="nomeCampanha">Nome da Campanha</label>
                            <input type="text" class="form-control" name="nomeCampanha" id="nomeCampanha" list="listaCampanha">
                            <datalist id="listaCampanha">
                                @foreach($campanhas as $campanha)
                                    <option value="{{$campanha->nom_campanha}}">{{$campanha->nom_campanha}}</option>
                                @endforeach
                            </datalist>
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


