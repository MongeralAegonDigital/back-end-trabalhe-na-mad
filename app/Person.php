<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'email', 'senha', 'telefone', 'data_nascimento', 'CPF', 'RG', 'data_expedicao', 'orgao_expedidor', 'estado_civil', 'categoria', 'empresa_atual', 'profissao', 'renda_bruta', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado'];

    
}
