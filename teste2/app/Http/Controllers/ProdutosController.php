<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Produto;


class ProdutosController extends Controller
{
    public function index(){

        $produtos = \App\Produto::all();
        return view("produtos.index", compact('produtos'));

    }
    

    
    /**
     * Retorna um json com uma lista de produtos
     * @return Json
     */
    public function listarProdutosJson(){
        $produtos = \App\Produto::all();
        foreach($produtos as $key => $produto){
            $prods[$key] = $produto;
            
            foreach($produto->categorias as $keyCat => $categoria){
                $prods[$key]['categorias'][$keyCat] = $categoria->nome;
            }
        }
        
        return json_encode($prods);
    }
}
