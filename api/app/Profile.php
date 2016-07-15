<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $fillable = [
        'client_cpf', 'rg', 'numeroRg', 'dataRg', 'orgaoRg', 'estadoCivil', 'categoria', 'empresa', 'profissao', 'renda'
    ];
}
