<?php

namespace MongeralAegonApi\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	//deterimina os campos que podem ser inseridor por Mass Assignment
    protected $fillable = ['nome','imagem'];
    
    //obt�m os produtos de uma Categoria
    public function produtos()
    {
    	return $this->hasMany(ProdutoCategoria::class);
    }
    
    //formata a data de cria��o para o padr�o Brasileiro
    public function getCreatedAtAttribute($value)
    {
    	$dateTime = new \DateTime($value);
    	return $dateTime->format('d/m/Y H:i:s');
    }
}
