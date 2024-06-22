@extends('layouts.app', ['activePage' => 'qrcodes', 'titlePage' => __('QR Codes')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Criar Códigos QR</h4>
                            <!--<p class="card-category">Cultos da semana criados</p>-->
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('qrcodes.salvaQrCode') }}">
                                @csrf
                                <!-- <input type="hidden" name="cod_pessoa" id="cod_pessoa" value=""> -->

                                <div class="form-group">
                                    <label for="i_nome">Nome QR Code</label>
                                    <input type="text" class="form-control" name="nom_code" id="i_nome" value="">
                                </div>

                                <div class="form-group">
                                    <label for="i_tipo_qrcode" class="">tipo de QR Code</label>
                                    <select class="form-control" name="tipo_qrcode" id="i_tipo_qrcode">
                                        <option value="0" disabled selected>Selecione...</option>
                                        <option value="1">Pix</option>
                                        <option value="2">URL de Site</option>
                                    </select>
                                </div>

                                <div class="form-group div_url mt-3 d-none">
                                    <label for="i_nome">URL</label>
                                    <input type="text" class="form-control" name="dsc_url" id="i_url">
                                </div>

                                <div class="form-group div_tipo_chave d-none">
                                    <label for="tipo_chave">Tipo da Chave PIX</label>
                                    <select class="form-control" name="tipo_chave" id="i_tipo_chave">
                                        <option value="email">E-mail</option>
                                        <option value="cpf">CPF</option>
                                        <option value="cnpj">CNPJ</option>
                                        <option value="celular">Celular</option>
                                    </select>
                                </div>

                                <div class="form-group div_chave_pix d-none">
                                    <label for="i_chave_pix">&nbsp;</label>
                                    <input type="text" class="form-control" name="chave_pix" id="i_chave_pix"
                                           placeholder="Inserir Chave pix">
                                </div>


                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="idade">Tamanho</label>
                                        <select class="form-control" name="ind_tamanho" id="i_tamanho">
                                            <option value="small">Pequeno</option>
                                            <option value="medium">Médio</option>
                                            <option value="Large">Grande</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label for="cor_fundo" class="form-label">Cor de fundo</label>
                                        <input type="color"
                                               style="height: 40px; border: 0.1rem solid rgb(227, 236, 242); background: rgb(255, 255, 255); width: 100%;"
                                               class="form-control form-control-color" name="cor_fundo"
                                               id="cor_fundo" value="">
                                    </div>
                                    <div>
                                        <label for="i_ind_transparencia">Transparência</label>
                                        <select class="form-control" name="ind_transparencia" id="i_ind_transparencia">
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="cor_pontos" class="form-label">Cor dos pontos</label>
                                        <input type="color"
                                               style="height: 40px; border: 0.1rem solid rgb(227, 236, 242); background: rgb(255, 255, 255); width: 100%;"
                                               class="form-control form-control-color" name="cor_pontos"
                                               id="cor_pontos">
                                    </div>
                                </div>
                                <button class="btn btn-default">Criar QrCodes</button>
                            </form>
                            @if(!empty($codPix))

                                <!--<img
                                    src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{--urlencode($codPix)--}}">
                                <img src="https://qrcode.tec-it.com/API/QRCode?size=small&dpi=200&errorcorrection=H&data={{urlencode($codPix)}}">

                                <p>Código PIX: {{$codPix}}<p>
                                <br>

                                    <img src="https://qrcode.tec-it.com/API/QRCode?size=small&dpi=200&data={{urlencode($url)}}">
-->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $("#i_tipo_qrcode").change(function () {
            if ($(this).val() === '1') {
                $(".div_url").addClass('d-none')
                $(".div_tipo_chave").removeClass('d-none')
                $(".div_chave_pix").removeClass('d-none')
            } else {
                $(".div_url").removeClass('d-none')
                $(".div_chave_pix").addClass('d-none')
                $(".div_tipo_chave").addClass('d-none')
            }
        })
    </script>
@endpush
