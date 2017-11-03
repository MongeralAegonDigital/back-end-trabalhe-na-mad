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
            'cpf' => 'required|integer|digits_between:4,11',
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'date_birth' => 'required'
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        $response = response()->json($validator->errors()->messages(), 400);
        throw (new ValidationException($validator, $response))->status(400);
    }
    
}
