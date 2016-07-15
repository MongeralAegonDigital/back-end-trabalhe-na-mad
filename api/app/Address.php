<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'cpf';
    protected $incrementing = false;
    protected $fillable = [
        'cpf', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf'
    ];
}
