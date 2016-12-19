<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    /**
     * Recupera os produtos relacionados a categoria
     */
    public function produtos()
    {
        return $this->belongsToMany('App\Produto');
    }
}
