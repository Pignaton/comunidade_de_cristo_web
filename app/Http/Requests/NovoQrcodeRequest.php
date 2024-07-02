<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NovoQrcodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_qrcode' => 'required|boolean',
            'nom_code' => 'required|min:2',
            //'dsc_url' => 'url',
            'cor_fundo' => 'required|regex:/^[#][0-9A-F]{3,6}$/i',
            'cor_pontos' => 'required|regex:/^[#][0-9A-F]{3,6}$/i',
            'ind_tamanho' => 'required',Rule::in('small', 'medium', 'large'),
            'ind_tipo_chave_pix' => Rule::in('email', 'cpf', 'cnpf', 'telefone'),
           // 'ind_status' => 'required', Rule::in('A', 'I')
        ];
    }
}
