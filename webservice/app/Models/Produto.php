<?php

namespace MongeralAegonApi\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','data_fabricacao','tamanho','largura','peso'];
}
