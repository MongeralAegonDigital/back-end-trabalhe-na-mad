<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
        $idToIgnore = $this->isMethod('post') ? 0 : $this->cpf;
        return [
            'cpf' => [
                'required', 
                'size:11',
                Rule::unique('clients')->ignore($idToIgnore, 'cpf')
            ],
            'name' => ['required', 'max:200', 'string'],
            'password' => ['required', 'max:255'],
            'birthdate' => ['required', 'date'],
            'email' => [
                'required', 
                'email',  
                Rule::unique('clients')->ignore($this->cpf, 'cpf')
            ],
            
            'phones' => ['array', 'nullable'],
            'phones.*.number' => ['required_with:phones', 'max:14'],
            
            'address' => ['array', 'required'],
            'address.*.cep' => ['required', 'max:10'],
            'address.*.state' => ['required', 'max:255'],
            'address.*.city' => ['required', 'max:255'],
            'address.*.neighborhood' => ['required', 'max:255'],
            'address.*.street' => ['required', 'max:255'],
            'address.*.number' => ['required', 'max:1000000000', 'numeric'],
            'address.*.complement' => ['nullable', 'max:255', 'string'],
            
            'professional_data' =>  ['required'],
            'professional_data.rg' => ['required', 'size:12'],
            'professional_data.number' => ['required', 'min:1', 'numeric'],
            'professional_data.issuing_agency' => ['required', 'max:200'],
            'professional_data.actual_job' => ['max:200'],
            'professional_data.profession' => ['required', 'max:200'],
            'professional_data.gross_income' => ['required', 'between:0,99999999.99'],
            'professional_data.marital_status_id' => ['required', 'numeric'],
            'professional_data.work_category_id' => ['required', 'numeric']
        ];
    }
    
    /**
     * return the custom message for each validation error
     */
    public function messages()
    {
        return [
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.size' => 'O campo CPF deve possuir 11 caracteres.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' => 'O campo Nome aceita até 200 caracteres somente.',
            'name.string' => 'O campo Nome só aceita caracteres do tipo texto.',
            
            'password.required' => 'O Senha nome é obrigatório.',
            'password.max' => 'O campo Senha aceita até 200 caracteres somente.',
            
            'birthdate.required' => 'O campo Data de nascimento é obrigatório.',
            'birthdate.date' => 'O campo Data de nascimento é obrigatório.',
            
            'email.required' => 'O campo E-Mail é obrigatório.',
            'email.email' => 'O campo E-Mail deve ser um e-mail válido.',
            'email.unique' => 'O e-mail informado já está cadastrado.',
            
            'phones.array' => 'O campo Contato não foi informado no formato esperado, procure o administrador.',
            
            'phones.*.number.required_with' => 'O campo Número de contato é obrigatório.',
            'phones.*.number.max' => 'O campo Número de contato aceita até 14 caracteres somente.',
            
            'address.required' => 'O Endereço é obrigatório.',
            'address.array' => 'O campo Endereço não foi informado no formato esperado, procure o administrador.',
            
            'address.*.cep.required' => 'O campo CEP é obrigatório.',
            'address.*.cep.max' => 'O campo CEP aceita até 10 caracteres somente.',
            
            'address.*.state.required' => 'O campo Estado é obrigatório.',
            'address.*.state.max' => 'O campo Estado aceita até 255 caracteres somente.',
            
            'address.*.city.required' => 'O campo Cidade é obrigatório.',
            'address.*.city.max' => 'O campo Cidade aceita até 255 caracteres somente.',
            
            'address.*.neighborhood.required' => 'O campo Bairro é obrigatório.',
            'address.*.neighborhood.max' => 'O campo Bairro aceita até 255 caracteres somente.',
            
            'address.*.street.required' => 'O campo Logradouro é obrigatório.',
            'address.*.street.max' => 'O campo Logradouro aceita até 255 caracteres somente.',
            
            'address.*.number.required' => 'O campo Número é obrigatório.',
            'address.*.number.max' => 'O campo Número aceita até 10 caracteres somente.',
            'address.*.number.numeric' => 'O campo Número aceita somente caracteres numéricos.',
            
            'address.*.complement.max' => 'O campo Complemento aceita até 255 caracteres somente.',
            'address.*.complement.string' => 'O campo Complemento aceita somente caracteres do tipo texto.',
            
            'professional_data.required' => 'Os Dados profissionais são obrigatórios.',
            
            'professional_data.rg.required' => 'O campo RG é obrigatório.',
            'professional_data.rg.size' => 'O campo RG deve ter 12 caracteres.',
            
            'professional_data.number.required' => 'O campo Número é obrigatório.',
            'professional_data.number.min' => 'O campo Número deve ter pelo menos 1 caracteres.',
            'professional_data.number.numeric' => 'O campo Número aceita somente caracteres numéricos.',
            
            'professional_data.issuing_agency.required' => 'O campo Orgão emissor é obrigatório.',
            'professional_data.issuing_agency.max' => 'O campo Orgão emissor aceita até 200 caracteres somente.',
            
            'professional_data.actual_job.max' => 'O campo Empresa atual aceita até 200 caracteres somente.',
            
            'professional_data.profession.required' => 'O campo Profissão é obrigatório.',
            'professional_data.profession.max' => 'O campo Profissão aceita até 200 caracteres somente.',
            
            'professional_data.gross_income.required' => 'O campo Renda bruta é obrigatório.',
            'professional_data.gross_income.between' => 'O campo Renda bruta aceita valores até 99999999,99.',
            
            'professional_data.marital_status_id.required' => 'O campo Estado civíl é obrigatório.',
            'professional_data.marital_status_id.numeric' => 'O campo Estado civíl não foi informado no formato esperado, procure o administrado.',
            
            'professional_data.work_category_id.required' => 'O campo Categoria empregatícia é obrigatório.',
            'professional_data.work_category_id.numeric' => 'O campo Categoria empregatícia não foi informado no formato esperado, procure o administrado.',
        ];
    }
}