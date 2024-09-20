@extends('pages.pagina_de_links.index', ['activePage' => 'pagina', 'titlePage' => __('Página de Design')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
    <link href="{{ asset('assets') }}/css/design.css" rel="stylesheet"/>
@endsection
@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{isset($link)? 'Editar Link - ' . $link->titulo  : 'Criar Novo Link'}}</h4>
                    <p class="card-category"></p>
                </div>
                <form method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
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
                                    <div class="col-md-12">
                                        <label for="ind_status" class="mt-2">Status</label>
                                        <select name="ind_status" id="ind_status" class="custom-select">
                                            <option
                                                value="0" {{isset($link) ? ($link->ind_status === '0' ? 'selected': '' ) : ''}}>
                                                Ativo
                                            </option>
                                            <option
                                                value="1" {{isset($link) ? ($link->ind_status === '1' ? 'selected': '' ) : ''}}>
                                                Inativo
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="titulo" class="mt-2">Título do Link</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                               value="{{$link->titulo ?? ''}}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="href" class="mt-2">URL do link</label>
                                        <input type="text" class="form-control" id="href" name="href"
                                               value="{{$link->href ?? ''}}">
                                    </div>

                                    <!--
                                    <div class="col-md-12">
                                        <label for="op_bg_color" class="mt-2">Cor de Fundo</label>
                                        <input type="color" class="form-control" id="op_bg_color" name="op_bg_color"
                                               value="{{--$link->op_bg_color ?? '#FFFFFF'--}}">
                                    </div>
                                    -->
                                    <div class="col-md-12">
                                        <label for="op_text_color">Cor do Texto</label>
                                        <input type="color" class="form-control" id="op_text_color"
                                               name="op_text_color"
                                               value="{{$link->op_text_color ?? '#000000'}}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="op_border_type" class="form-label mt-2">Tipo de Borda</label>
                                        <select name="op_border_type" id="op_border_type"
                                                class="custom-select">
                                            <option
                                                value="square" {{isset($link) ? ($link->op_border_type === 'square' ? 'selected': '' ) : ''}} >
                                                Quadrado
                                            </option>
                                            <option
                                                value="rounded" {{isset($link) ? ($link->op_border_type === 'rounded' ? 'selected': '' ) : ''}}>
                                                Arredondado
                                            </option>
                                            <option
                                                value="outline" {{isset($link) ? ($link->op_border_type === 'outline' ? 'selected': '' ) : ''}}>
                                                Contorno
                                            </option>
                                        </select>
                                    </div>
                                    @if($link->cod_links === 1)
                                        <div class="col-md-12 mt-3" js-file-manager>
                                            <legend class="file-input__label">Imagem</legend>
                                            <fieldset class="file-input">
                                                <label class="file-input__real" hidden aria-hidden="true">

                                                    <input type="file" id="applications" name="applications" class="form-control"
                                                           js-real-file-input accept="image/*">
                                                </label>
                                                <div class="file-input__input input input__container">
                                                          <span class="input__left">
                                                            <button type="button" class="input__choose"
                                                                    js-fake-file-input>Escolher arquivo</button>
                                                            <span class="input__no-file" js-no-file>Nenhum arquivo selecionado</span>
                                                          </span>
                                                    <span class="input__files chip__container"
                                                          js-chip-container></span>
                                                    <button type="button" class="input__remove" hidden
                                                            js-remove-files>
                                                        <svg>
                                                            <use xlink:href="#sprite-close"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </fieldset>
                                            <span class="file-input__helper"></span>

                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <label for="btnSalvar">&nbsp;</label>
                                        <button type="submit" id="btnSalvar" class="form-control btn btn-success">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="class-992chau previewmobile" style="display:none;">
        <div class="btnclosepreview"
             style="background: rgb(60, 66, 69); padding: 12px; text-align: center; margin: 0px auto; color: rgb(255, 255, 255); cursor: pointer;">
            <a><i class="material-icons mr-2">cancel</i>
                Fechar</a>
        </div>
        <div class="sc-gJqsIT" style="width: 90%; margin: 15px auto; position: relative; display: flex;">
            <a class="nav-link text-center las2tabs selected_las2tabs"
               style="background: rgb(255, 255, 255); padding: 0.5rem; border: 2px solid rgb(243, 247, 250); border-radius: 5px; line-height: 32px; width: 100%;">
                <i class="material-icons mr-2">smartphone</i>Preview Page</a>
        </div>
        <div class="container_rightside previewmobile_2">
            <div class="video-wrapper">
                <iframe frameborder="0" src="{{url('fique-por-dentro')}}"></iframe>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(".solomobile").on('click', function () {
                $('.previewmobile').css('display', 'block');
            })
            $(".btnclosepreview").on('click', function () {
                $('.previewmobile').css('display', 'none');
            })

            const fileManager = document.querySelector('[js-file-manager]');

            class FileManager {
                static chipTemplate = (text, id) => {
                    return `
                  <span id="${id}" class="chip">
                    <span class="chip__text">${text}</span>
                  </span>`;
                }

                static generateId = () => {
                    const randomId = (Math.random() * 0xFFFFFF << 0).toString(16);

                    return `chip-${randomId}`;
                }

                constructor(containerElement) {
                    this._containerElement = containerElement;
                    this._fakeInput = this._containerElement.querySelector('[js-fake-file-input]');
                    this._realInput = this._containerElement.querySelector('[js-real-file-input]');
                    this._chipContainer = this._containerElement.querySelector('[js-chip-container]');
                    this._noFile = this._containerElement.querySelector('[js-no-file]');
                    this._removeFilesButton = this._containerElement.querySelector('[js-remove-files]');

                    this._files = [];

                    this._addEventListeners();
                }

                _addEventListeners = () => {
                    this._fakeInput.addEventListener('click', this._handleFakeInputClick, false);
                    this._realInput.addEventListener('change', this._handleRealInputChange, false);
                    this._removeFilesButton.addEventListener('click', this._handleRemoveFilesButtonClick, false);
                }

                _handleFakeInputClick = () => {
                    if (this._chipContainer.querySelectorAll('.chip').length > 0) {
                        this._removeChips();
                    }

                    this._realInput.click();
                }

                _handleRealInputChange = (e) => {
                    if (this._realInput.files.length > 0) {
                        this._toggleNoFile();
                        [...this._realInput.files].forEach(file => {
                            const name = file.name;
                            const id = FileManager.generateId();
                            const chipTemplate = FileManager.chipTemplate(name, id);

                            this._chipContainer.insertAdjacentHTML('beforeend', chipTemplate);

                            const chip = this._chipContainer.querySelector(`#${id}`);

                            const filesObj = {name, id, chip};

                            this._files.push(filesObj);
                        })
                    }
                }

                _handleRemoveFilesButtonClick = (e) => {
                    if (this._realInput.files.length) {
                        this._removeChips();
                    }
                }

                _removeChips = () => {
                    const chips = [...this._chipContainer.querySelectorAll('.chip')];
                    this._toggleNoFile();
                    this._files = [];
                    this._chipContainer.innerHTML = '';
                    this._realInput.value = '';
                }

                _toggleNoFile = () => {
                    this._noFile.hidden = !this._noFile.hidden;
                    this._removeFilesButton.hidden = !this._removeFilesButton.hidden;
                }
            }

            const fileManagerReference = new FileManager(fileManager);
        </script>
    @endpush
@endsection


