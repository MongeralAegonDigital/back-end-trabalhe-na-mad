<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
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
        $rules =  [
            'name'          => 'required|min:5',
            'fabricacao'    => 'required|Date',
            'tamanho'       => 'required',
            'largura'       => 'required',
            'peso'          => 'required',
            'categoria'     => 'required',

        ];
        return $rules;
    }

    public function messages()
    {
        return  [
            "categoria." => "Deve conter pelo menos uma categoria",

        ];

    }


}
