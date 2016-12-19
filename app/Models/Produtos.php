<?php

namespace App\Models;


use App\Models\Categoria;

use Illuminate\Database\Eloquent\Model;

use DB;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'name','fabricacao', 'tamanho', 'largura','peso'
    ];

    public function categoria()
    {
        return $this->belongsToMany('App\Models\Categoria', 'categoria_produtos', 'produto', 'categoria');
    }

    public function notCategoria($id){
       return Categoria::
        whereNotIn('categorias.id', function($query) use ($id){
            $query->select(DB::raw('categoria_produtos.categoria'))
                ->from('categoria_produtos')
                ->where('produto',$id);
        })->get();
    }

}
