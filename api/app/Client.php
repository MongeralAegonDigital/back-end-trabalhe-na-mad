<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'cpf';
    protected $fillable = [
        'cpf', 'nome', 'senha', 'telefone', 'email', 'dataNascimento'
    ];
    protected $hidden = ['senha'];
}
