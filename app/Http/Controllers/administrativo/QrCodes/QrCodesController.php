<?php

namespace App\Http\Controllers\Administrativo\QrCodes;

use App\Models\QrCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class QrCodesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function index()
    {
        $qrCodes = QrCode::all();
        return view('pages.qrcodes.index', ['qrCodes' => $qrCodes]);
    }

    public function editaQrCode(Request $request)
    {
        return view('pages.qrcodes.edita');
    }

    public function criarQrCode()
    {
        return view('pages.qrcodes.criar');
    }

    public function salvaQrCode(Request $request)
    {
        $cor_fundo = preg_replace('/#/', '', $request->cor_fundo);
        $cor_pontos = preg_replace('/#/', '', $request->cor_pontos);


        // Exemplos de chave PIX
        //
        // E-mail: nome@exemplo.com.br
        // CPF: 12345678901 (só números)
        // CNPJ: 12345678000123 (só números)
        // Celular: +5511912345678 (+55 + DDD + número)
        //
        // $chave = "kpignaton@ymail.com";
        // $url = "https://comunidadecristo.com.br/comunidade-de-cristo";

        // Valor da transação
        $valorTransacao = 1.23;

        // Identificador único da transação, caso exista
        $idTransacao = "";

        // Obtem código copia e cola do PIX
        $codigoPix = $this->geraPix($request->chave_pix, $idTransacao, $valorTransacao);

        $qrcode = new QrCode();

        /*if ($this->validador($request->all())->fails()) {
            return redirect('gerador/criar/qr-code')
                ->withErrors($this->validador($request->all()))
                ->withInput();
        }*/

        $qrcode->nom_code = $request->nom_code;
        $qrcode->ind_tipo_code = $request->tipo_qrcode;
        $qrcode->dsc_url = $request->dsc_url;
        $qrcode->ind_tipo_chave_pix = $request->tipo_chave;
        $qrcode->chave_pix = $request->chave_pix;
        $qrcode->ind_tamanho = $request->ind_tamanho;
        $qrcode->cor_de_fundo = $cor_fundo;
        $qrcode->ind_transparencia = $request->ind_transparencia;
        $qrcode->cor_do_pontos = $cor_pontos;
        $qrcode->codigo_pix = $codigoPix;
        //$qrcode->valor_pix = $codigoPix;
        $qrcode->save();

        $qrCodes = QrCode::all();

        return view('pages.qrcodes.index', [
            'codPix' => $codigoPix,
            'qrCodes' => $qrCodes
        ]);
    }

    /**
     * @param $id
     * @param $valor
     * @return string
     *  concatena o ID do campo, o tamanho do valor e o valor.
     */
    private function formataCampo($id, $valor)
    {

        return $id . str_pad(strlen($valor), 2, '0', STR_PAD_LEFT) . $valor;
    }

    /**
     * @param $dados
     * @return string
     * Calcula o CRC16 dos dados para validar o código PIX. Utiliza operações bit a bit para processar cada caractere dos dados.
     */
    private function calculaCRC16($dados)
    {

        $resultado = 0xFFFF;
        for ($i = 0; $i < strlen($dados); $i++) {
            $resultado ^= (ord($dados[$i]) << 8);
            for ($j = 0; $j < 8; $j++) {
                if ($resultado & 0x8000) {
                    $resultado = ($resultado << 1) ^ 0x1021;
                } else {
                    $resultado <<= 1;
                }
                $resultado &= 0xFFFF;
            }
        }
        return strtoupper(str_pad(dechex($resultado), 4, '0', STR_PAD_LEFT));
    }

    /**
     * @param $chave
     * @param $idTx
     * @param $valor
     * @return string
     * Gera o código PIX completo, incorporando todos os campos necessários para a transação, incluindo a chave PIX, o valor e o identificador da transação.
     */
    private function geraPix($chave, $idTx = '', $valor = 0.00)
    {

        $resultado = "000201";
        $resultado .= $this->formataCampo("26", "0014br.gov.bcb.pix" . $this->formataCampo("01", $chave));
        $resultado .= "52040000"; // Código fixo
        $resultado .= "5303986";  // Moeda (Real)
        if ($valor > 0) {
            $resultado .= $this->formataCampo("54", number_format($valor, 2, '.', ''));
        }
        $resultado .= "5802BR"; // País
        $resultado .= "5901N";  // Nome
        $resultado .= "6001C";  // Cidade
        $resultado .= $this->formataCampo("62", $this->formataCampo("05", $idTx ?: '***'));
        $resultado .= "6304"; // Início do CRC16
        $resultado .= $this->calculaCRC16($resultado); // Adiciona o CRC16 ao final
        return $resultado;
    }

    protected function validador(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'idade' => ['required', 'string', 'max:255'],
            'culto' => ['required', 'string'],
            'email' => ['string', 'email', 'max:255', 'unique:pessoa'],
            'sexo' => ['required_without_all']
        ]);
    }
}
