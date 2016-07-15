<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'cpf';
    protected $incrementing = false;
    protected $fillable = [
        'cpf', 'rg', 'numeroRg', 'dataRg', 'orgaoRg', 'estadoCivil', 'categoria', 'empresa', 'profissao', 'renda'
    ];
}
