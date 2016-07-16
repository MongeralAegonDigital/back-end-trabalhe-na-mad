<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $fillable = [
        'client_cpf', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf'
    ];
}
