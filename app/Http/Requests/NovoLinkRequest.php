<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NovoLinkRequest extends FormRequest
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
            'ind_status' =>  'required|boolean',
            'titulo' => 'required|min:2',
            'href' => 'required|url',
            'op_bg_color' => 'required|regex:/^[#][0-9A-F]{3,6}$/i',
            'op_text_color' => 'required|regex:/^[#][0-9A-F]{3,6}$/i',
            'op_border_type' => 'required', Rule::in('square', 'rounded', 'outline')
        ];
    }
}
