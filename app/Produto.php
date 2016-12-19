<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    /**
     * Recupera as categorias relacionados ao produto
     */
    public function categorias()
    {
        return $this->belongsToMany('App\Categoria');
    }

    public function categoriaProduto()
    {
        return $this->hasMany('App\CategoriaProduto');
    }

//    // this is a recommended way to declare event handlers
//    protected static function boot() {
//        parent::boot();
//
//        static::deleting(function($produto) { // before delete() method call this
//            $produto->categoriaProduto()->delete();
//            // do the rest of the cleanup...
//        });
//    }
}
