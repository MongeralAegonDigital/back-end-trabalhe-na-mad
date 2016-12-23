<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        $rules =  [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|between:4,20|confirmed',

        ];
        return $rules;
    }

    public function messages()
    {
        return  [
            "password.between" => "A senha deve estar entre 4 e 20 caracteres.",
            "password.confirmed" =>"A confirmação de senha não confere."

        ];

    }
}
