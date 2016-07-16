<?php

namespace MongeralAegonApi\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	//deterimina os campos que podem ser inseridor por Mass Assignment
    protected $fillable = ['nome','imagem'];
    
    //obtém os produtos de uma Categoria
    public function produtos()
    {
    	return $this->hasMany(ProdutoCategoria::class);
    }
}
