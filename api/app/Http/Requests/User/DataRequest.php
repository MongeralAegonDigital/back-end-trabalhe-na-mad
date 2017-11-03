<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'user_cpf' => 'required',
            'rg' => 'required|integer',
            'date_expedition' => 'required',
            'org' => 'required',
            'marital_status' => 'required',
            'category' => 'required|in:Outros,Empregado,Empregador,Autônomo',
            'occupation' => 'required',
            'salary' => 'required'
        ];
    }
}
