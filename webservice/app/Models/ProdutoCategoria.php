<?php

namespace MongeralAegonApi\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
	//deterimina os campos que podem ser inseridor por Mass Assignment
	protected $table = "produtos_categorias";
    protected $fillable = ['produto_id','categoria_id'];
    
    public function produto()
    {
    	return $this->belongsTo(Produto::class);
    }
    
    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }
}
