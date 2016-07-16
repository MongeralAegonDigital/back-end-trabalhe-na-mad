<?php

namespace MongeralAegonApi\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	//deterimina os campos que podem ser inseridor por Mass Assignment
    protected $fillable = ['nome','data_fabricacao','tamanho','largura','peso'];
    
    //obtém as categorias de um Produto
    public function categorias()
    {
    	return $this->hasMany(ProdutoCategoria::class);
    }
    
    //converta a data de fabricação para o formate MySQL 
    public function setDataFabricacaoAttribute($value)
    {
    	$dataFabricaco = str_replace('/', '-', $value);
    	$dateTime = new \DateTime($dataFabricaco);
    	$this->attributes['data_fabricacao'] = $dateTime->format("Y-m-d");
    }
}
