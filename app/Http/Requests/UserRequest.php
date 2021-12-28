<?php

namespace App\Http\Requests;

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
            'name'          => 'required|min:3|max:80',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|between:6,12',
            'cpf'           => 'required|cpf',
            'phone'         => 'required|between:11,20',
            'birth_date'    => 'required|date',

            'personal_data.RG'              => 'required|min:9',
            'personal_data.number'          => 'required',
            'personal_data.ship_date'       => 'required|date',
            'personal_data.issuing_body'    => 'required|min:5|max:80',
            'personal_data.marital_status'  => 'required',
            'personal_data.category_id'     => 'required',
            'personal_data.profession'      => 'required|min:5|max:20',
            'personal_data.salary'          => 'required|min:5|max:10',

            'address.cep'                 => 'required',
            'address.public_area'         => 'required',
            'address.number'              => 'required',
            'address.complement'          => 'required',
            'address.district'            => 'required',
            'address.city'                => 'required',
            'address.state'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => 'O nome é obrigatório',
            'name.min'                => 'O tamanho mínimo do campo nome são 3 caracteres',
            'name.max'                => 'O tamanho maximo do campo nome são 80 caracteres',

            'email.required'          => 'O e-mail é obrigatório',
            'email.email'             => 'E-mail inválido',
            'email.unique'            => 'E-mail já existente',

            'password.required'       => 'A senha é obrigatória',
            'password.between'        => 'A senha deve ter entre 6 e 12 caracteres',  

            'phone.required'          => 'O telefone é obrigatório',
            'phone.size'              => 'Telefone inválido',

            'cpf.require'             => 'O CPF é obrigatório',
            'cpf.cpf'                 => 'CPF inválido',

            'personal_data.RG.required'              => 'O RG é obrigatório',
            'personal_data.RG.min'                   => 'RG inválido',

            'personal_data.number.required'          => 'O Número é obrigatório',

            'personal_data.ship_date.required'       => 'A Data de Expedição é obrigatório',
            'personal_data.ship_date.date'           => 'Data de Expedição inválida',

            'personal_data.issuing_body.required'    => 'Orgão expedidor é obrigatório',
            'personal_data.issuing_body.min'         => 'Orgão expedidor inválido',
            'personal_data.issuing_body.max'         => 'Orgão expedidor inválido',

            'personal_data.marital_status.required'  => 'O Estado Civil é obrigatório',

            'personal_data.category_id.required'     => 'A Categoria é obrigatório',

            'personal_data.profession.required'      => 'Profissão é obrigatório',
            'personal_data.profession.min'           => 'Profissão inválida',
            'personal_data.profession.max'           => 'Profissão inválida',

            'personal_data.salary.required'          => 'Salário é obrigatório',
            'personal_data.salary.min'               => 'Salário inválido',
            'personal_data.salary.max'               => 'Salário inválido',

            'address.cep.required'                 => 'Cep é obrigatório',
            'address.public_area.required'         => 'Logradouro é obrigatório',
            'address.number.required'              => 'Número é obrigatório',
            'address.complement.required'          => 'Complemento é obrigatório',
            'address.district.required'            => 'Bairro é obrigatório',
            'address.city.required'                => 'Cidade é obrigatório',
            'address.state.required'               => 'Estado é obrigatório',
        ];
    }
}
