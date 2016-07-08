<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProdutosAdminController extends Controller
{
    private $produto;


    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }
    
    public function create() {
        return view('admin.produtos.create');
    }
    
    
    public function edit($id) {
        $produto = $this->produto->find($id);
        return view("admin.produtos.edit", compact("produto"));
    }
    
    /**
     * Exclui um produto
     * @param int $id
     */
    public function destroy($id){
        if($this->produto->find($id)->delete()){
            echo "true";
        }else{
            echo "false";
        }
    }
    
    public function index() {
        $produtos = $this->produto->paginate(5);
        return view("admin.produtos.index", compact("produtos"));
    }
    
    /**
     * Cria um novo produto
     * @param Request $request
     */
    public function store(Request $request) {
        $produto = $this->produto->create($request->all());
        if($produto->categorias()->sync($this->getCategoriasIds($request->categorias))){
            echo "true";
        }else{
            echo "false";
        }
    }
    
    /**
     * Atualiza um produto
     * @param int $id
     * @param Request $request
     */
    public function update($id, Request $request){
        $this->produto->find($id)->update($request->all());
        $produto = $this->produto->find($id);
        $produto->categorias()->sync($this->getCategoriasIds($request->categorias));
        echo "true";
    }
    
    /**
     * Retorna os ids das categorias do produto
     * @param Request $categorias
     * @return Array
     */
    private function getCategoriasIds($categorias){
        $categoriasList = array_filter(array_map('trim',explode(",", $categorias)));
        $categoriasIds = [];
        foreach($categoriasList as $categoriaName){
            $categoriasIds[] = Categoria::firstOrCreate(["nome" => $categoriaName])->id;
        }
        return $categoriasIds;
    }
}
