<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cep',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement',
        'client_cpf'
        ];
}
