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
        if(isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != ""){
            $produtos = \App\Produto::orderBy($_REQUEST['ordenar'], 'asc')->get();
        }else{
            $produtos = \App\Produto::all();
        }
        $prods = "";
        foreach($produtos as $key => $produto){
            $prods[$key] = $produto;
            
            foreach($produto->categorias as $keyCat => $categoria){
                $prods[$key]['categorias'][$keyCat] = $categoria->nome;
            }
        }
        
        return json_encode($prods);
    }
}
