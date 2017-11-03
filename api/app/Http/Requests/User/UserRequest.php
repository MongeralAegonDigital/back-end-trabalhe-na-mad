<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
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
            'cpf' => 'required|digits:11|unique:users',
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'date_birth' => 'required',

            'address.cep' => 'required|integer|digits_between:5,10',
            'address.street' => 'required',
            'address.number' => 'required',
            'address.address2' => 'required',
            'address.neighbor' => 'required',
            'address.city' => 'required',
            'address.state' => 'required',

            'data.rg' => 'required|integer',
            'data.date_expedition' => 'required',
            'data.org' => 'required',
            'data.marital_status' => 'required',
            'data.category' => 'required|in:Outros,Empregado,Empregador,Autônomo',
            'data.occupation' => 'required',
            'data.salary' => 'required'
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        $response = response()->json($validator->errors()->messages(), 400);
        throw (new ValidationException($validator, $response))->status(400);
    }
    
}
