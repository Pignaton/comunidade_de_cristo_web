@extends('layouts.app', ['activePage' => 'qrcodes', 'titlePage' => __('QR Codes')])



@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Códigos QR Ativos</h4>
                            <!--<p class="card-category">Cultos da semana criados</p>-->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('qrcodes.criarQrCode') }}" class="btn btn-outline-success"
                                       style="display: inline-block; float: right;">
                                        <i class="material-icons">add</i>&nbsp;
                                        Criar QR Code
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($qrCodes as $qrCode)
                                    <div class="col-md-12 col-lg-6 mb-4">
                                        <div class="pricing-card">
                                            <div class="card shadow-soft border-light">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-sm-5">
                                                        <header class="card-header text-center">
                                                    <span class="d-block my-2">
                                                        <img
                                                            src="https://qrcode.tec-it.com/API/QRCode?color=%23{{$qrCode->cor_do_pontos}}&backcolor=%23{{$qrCode->cor_de_fundo}}&istransparent={{$qrCode->ind_transparencia}}&&size={{$qrCode->ind_tamanho}}&dpi=100&data={{urlencode($qrCode->codigo_pix)}}"
                                                            style="cursor: initial; background-repeat: no-repeat; background-size: contain; background-position: center center; width: initial; height: 178px;">
                                                        <!-- <div class="mt-2">
                                                             <small
                                                                 style="color: rgb(81, 81, 81); display: block; white-space: nowrap; text-overflow: ellipsis; max-width: 100%; overflow: hidden;">
                                                                 <i class="material-icons"
                                                                    style="padding-right: 5px; color: rgb(21, 169, 124);">link</i>
                                                                <a href="https://qr.link/ybzNuH" target="_blank">qr.link/ybzNuH</a>
                                                             </small>
                                                            </div>-->
                                                    </span>
                                                            <button type="button" id="DownloadDropdown"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"
                                                                    class="btn btn-sm btn-outline-secondary btn-block">
                                                                @if($qrCode->ind_tipo_code === 1)
                                                                    Copiar
                                                                @else
                                                                    Baixar
                                                                @endif
                                                            </button>
                                                            <div aria-labelledby="DownloadDropdown"
                                                                 class="dropdown-menu dropdown-menu-center mt-0"
                                                                 style="min-width: 178px !important;">
                                                                <a href="/png-download/ybzNuH/Untitled"
                                                                   download="Untitled"
                                                                   class="dropdown-item text-sm"
                                                                   style="border-bottom: none;">
                                                                    <i class="material-icons mr-2"
                                                                       style="padding-right: 4px; padding-left: 4px;">download</i>
                                                                    <p> PNG</p>
                                                                </a>
                                                                <a href="/svg-download/ybzNuH/Untitled"
                                                                   download="Untitled"
                                                                   class="dropdown-item text-sm"
                                                                   style="border-bottom: none;">
                                                                    <i class="material-icons mr-2"
                                                                       style="padding-right: 4px; padding-left: 4px;">download</i>
                                                                    <p>SVG</p>
                                                                </a>
                                                            </div>
                                                            <div class="resultholder"
                                                                 style="position: absolute; left: -999em;">
                                                                <img id="scream"
                                                                     src="https://qrcode.tec-it.com/API/QRCode?color=%23{{$qrCode->cor_do_pontos}}&backcolor=%23{{$qrCode->cor_de_fundo}}&istransparent={{$qrCode->ind_transparencia}}&&size={{$qrCode->ind_tamanho}}&dpi=100&data={{urlencode($qrCode->codigo_pix)}}"
                                                                     class="img-fluid" style="width: 200px;">
                                                            </div>
                                                        </header>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="card-body">
                                                            <div>
                                                                <a style="cursor: initial; color: rgb(81, 81, 81);">{{$qrCode->nom_code}}</a>
                                                                <small class="container-icon"
                                                                       style="color: rgb(81, 81, 81);">
                                                                    <i class="material-icons"
                                                                       style="padding-right: 5px;">link</i>
                                                                    {{ ($qrCode->ind_tipo_code === 1)? 'PIX': 'URL de Site' }}
                                                                </small>
                                                                <div>
                                                                    <div id="defaultbody" style="">
                                                                        <div class="container-icon">
                                                                            <div class="icon">
                                                                                <i class="material-icons"
                                                                                   style="padding-right: 4px; padding-left: 4px;">edit</i>
                                                                            </div>
                                                                            <a href="/dashboard/edit-content/ybzNuH"
                                                                               class="">
                                                                                Editar conteúdo
                                                                            </a>
                                                                        </div>
                                                                        <div class="container-icon">
                                                                            <div class="icon">
                                                                                <i class="material-icons"
                                                                                   style="padding-right: 4px; padding-left: 4px;">palette</i>
                                                                            </div>
                                                                            <a href="/dashboard/edit-colorandshape/ybzNuH">Editar
                                                                                cor e forma</a>
                                                                        </div>
                                                                        <div class="container-icon">
                                                                            <div class="icon">
                                                                                <i class="material-icons"
                                                                                   style="color: rgb(10, 74, 180); padding-right: 4px; padding-left: 4px;">inventory_2</i>
                                                                            </div>
                                                                            <a>Desativar Link</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
