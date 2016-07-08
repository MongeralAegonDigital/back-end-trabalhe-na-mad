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
         
        $clauses = FALSE;
        if(isset($_REQUEST['nome']) && $_REQUEST['nome'] != ""){
            $clauses['nome'] = $_REQUEST['nome'];
        }
        if(isset($_REQUEST['data_fabricacao']) && $_REQUEST['data_fabricacao'] != ""){
            $clauses['data_fabricacao'] = $_REQUEST['data_fabricacao'];
        }
        if(isset($_REQUEST['tamanho']) && $_REQUEST['tamanho'] != ""){
            $clauses['tamanho'] = $_REQUEST['tamanho'];
        }
        if(isset($_REQUEST['largura']) && $_REQUEST['largura'] != ""){
            $clauses['largura'] = $_REQUEST['largura'];
        }
        if(isset($_REQUEST['peso']) && $_REQUEST['peso'] != ""){
            $clauses['peso'] = $_REQUEST['peso'];
        }
        
        if(isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != ""){
            $order = $_REQUEST['ordenar'];
        }else{
            $order = "id";  
        }
        if($clauses){
            $produtos = \App\Produto::orderBy($order, 'asc')->where($clauses)->get();
        }else{
            $produtos = \App\Produto::orderBy($order, 'asc')->get();
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
