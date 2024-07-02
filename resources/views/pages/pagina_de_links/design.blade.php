@extends('pages.pagina_de_links.index', ['activePage' => 'pagina', 'titlePage' => __('Página de Design')])
@section('style')
    <link href="{{ asset('assets') }}/css/pagina_links.css" rel="stylesheet"/>
    <link href="{{ asset('assets') }}/css/design.css" rel="stylesheet"/>
@endsection
@section('body')
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" display="none"
         aria-hidden="true" width="0" height="0" hidden>
        <defs>
            <symbol id="sprite-close" viewBox="0 0 24 24">
                <title>Remove chip</title>
                <path
                    d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z"/>
            </symbol>
        </defs>
    </svg>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(auth()->user()->nivel !== '2')
                        <div class="d-flex justify-content-center">
                            <i class="material-icons mr-2">construction</i> Em desenvolvimento
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{isset($pagina)? 'Editar Página - ' . $pagina->op_title  : 'Criar Nova Página'}}</h4>
                                <p class="card-category"></p>
                            </div>
                            <form method="POST"
                                  action="{{url('administrativo/pagina/edita/design/'.$pagina->cod_pagina)}}"
                                  enctype="multipart/form-data">
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
                                                    <label for="ind_status_pagina" class="mt-2">Status</label>
                                                    <select name="ind_status_pagina" id="ind_status_pagina"
                                                            class="custom-select">
                                                        <option
                                                            value="0" {{isset($pagina) ? ($pagina->ind_status_pagina === '0' ? 'selected': '' ) : ''}}>
                                                            Ativo
                                                        </option>
                                                        <option
                                                            value="1" {{isset($pagina) ? ($pagina->ind_status_pagina === '1' ? 'selected': '' ) : ''}}>
                                                            Pausado
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="op_title" class="mt-2">Título da Página</label>
                                                    <input type="text" class="form-control" id="op_title"
                                                           name="op_title"
                                                           value="{{$pagina->op_title ?? ''}}">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="op_description" class="mt-2">Descrição</label>
                                                    <input type="text" class="form-control" id="op_description"
                                                           name="op_description"
                                                           value="{{$pagina->op_description ?? ''}}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="slug" class="mt-2">Identificar da Pagina (URL)</label>
                                                    <input type="text" class="form-control" id="slug" name="slug"
                                                           value="{{$pagina->slug ?? ''}}">
                                                    <small> É a parte da URL que vem após o nome de domínio</small>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="op_bg_color" class="mt-2">Cor de Fundo</label>
                                                    <input type="color" class="form-control form-control-color"
                                                           id="op_bg_value"
                                                           name="op_bg_value"
                                                           value="{{$pagina->op_bg_value ?? '#FFFFFF'}}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="op_text_color">Cor do Texto</label>
                                                    <input type="color" class="form-control" id="op_font_color"
                                                           name="op_font_color"
                                                           value="{{$pagina->op_font_color ?? '#000000'}}">
                                                </div>

                                                <div class="col-md-12 mt-3" js-file-manager>
                                                    <fieldset class="file-input">
                                                        <legend class="file-input__label">Imagem</legend>
                                                        <label class="file-input__real" hidden aria-hidden="true">
                                                            <!--  accept=".json" -->
                                                            <input type="file" id="applications" class="form-control"
                                                                   js-real-file-input>
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

                                                <div class="col-md-12">
                                                    <label for="btnSalvar">&nbsp;</label>
                                                    <button type="submit" id="btnSalvar"
                                                            class="form-control btn btn-success">
                                                        Salvar
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
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
