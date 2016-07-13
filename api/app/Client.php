<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'cpf';
    protected $fillable = [
        'cpf', 'nome', 'senha', 'telefone', 'email', 'dataNascimento', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'rg', 'numeroRg', 'dataRg', 'orgaoRg', 'estadoCivil', 'categoria', 'empresa', 'profissao', 'renda'
    ];
    protected $hidden = ['senha'];
}
