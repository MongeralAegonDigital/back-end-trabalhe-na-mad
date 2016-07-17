<?php

namespace MongeralAegonApi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
    
    //formata a data para o padrão Brasileiro
    public function getDataFabricacaoAttribute($value)
    {
    	$dateTime = new \DateTime($value);
    	return $dateTime->format('d/m/Y');
    }
    
    //cria o filtro da tabela
    public function scopeTabelaFiltros($query, Request $request)
    {
    	if($request->has('filter')) {
    	
    		$filter = json_decode($request->query('filter'), true);
    		
    		if(isset($filter['nome']) && !empty($filter['nome'])) {
    			$query->where('nome','LIKE','%'.$filter['nome'].'%');
    		}
    		
    		if(isset($filter['data_fabricacao']) && !empty($filter['data_fabricacao'])) {
    			$dataFabricaco = str_replace('/', '-', $filter['data_fabricacao']);
    			$data = date('Y-m-d', strtotime($dataFabricaco));
    			$query->where('data_fabricacao','=', $data);
    		}
    		
    		if(isset($filter['tamanho']) && !empty($filter['tamanho'])) {
    			$query->where('tamanho', '=', $filter['tamanho']);
    		}
    		
    		if(isset($filter['largura']) && !empty($filter['largura'])) {
    			$query->where('largura', '=', $filter['largura']);
    		}
    		
    		if(isset($filter['peso']) && !empty($filter['peso'])) {
    			$query->where('peso', '=', $filter['peso']);
    		}
    		
    	}
    	
    	return $query;
    }
    
    //cria o sorte da tabela
    public function scopeTabelaSorte($query, Request $request)
    {
    	if($request->has('sort')) {
    		
    		$sort = json_decode($request->query('sort'), true);
    		    		
    		if(isset($sort['nome']) && !empty($sort['nome'])) {
    			$query->orderBy('nome', $sort['nome']);
    		}
    		
    		if(isset($sort['data_fabricacao']) && !empty($sort['data_fabricacao'])) {
    			$query->orderBy('data_fabricacao', $sort['data_fabricacao']);
    		}
    		
    		if(isset($sort['tamanho']) && !empty($sort['tamanho'])) {
    			$query->orderBy('tamanho', $sort['tamanho']);
    		}
    		
    		if(isset($sort['largura']) && !empty($sort['largura'])) {
    			$query->orderBy('largura', $sort['largura']);
    		}
    		
    		if(isset($sort['peso']) && !empty($sort['peso'])) {
    			$query->orderBy('peso', $sort['peso']);
    		}
    		
    	}
    	
    	return $query;
    }
}
