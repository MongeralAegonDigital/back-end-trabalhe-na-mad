<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'cep' => 'required|integer|digits_between:5,10',
            'street' => 'required',
            'number' => 'required',
            'address2' => 'required',
            'neighbor' => 'required',
            'city' => 'required',
            'state' => 'required'
        ];
    }
}
