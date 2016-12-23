<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    protected $table = 'categoria_produtos';
    protected $fillable = [
        'categoria','produto'
    ];
}
