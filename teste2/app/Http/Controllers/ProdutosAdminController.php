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
    
    public function store(Request $request) {
        $produto = $this->produto->create($request->all());
        $produto->categorias()->sync($this->getCategoriasIds($request));
        
        return redirect()->route("admin.produtos.index");
    }
    
    public function edit($id) {
        $produto = $this->produto->find($id);
        return view("admin.produtos.edit", compact("produto"));
    }
    
    public function update($id, Request $request){
        $this->produto->find($id)->update($request->all());
        $produto = $this->produto->find($id);
        
        $produto->categorias()->sync($this->getCategoriasIds($request->categorias));
        return redirect()->route("admin.produtos.index");
    }
    
    public function destroy($id){
        $this->produto->find($id)->delete();
        return redirect()->route("admin.produtos.index");
    }
    
    public function index() {
        $produtos = $this->produto->paginate(5);
        return view("admin.produtos.index", compact("produtos"));
    }
    
    private function getCategoriasIds($categorias){
        $categoriasList = array_filter(array_map('trim',explode(",", $categorias)));
        $categoriasIds = [];
        foreach($categoriasList as $categoriaName){
            $categoriasIds[] = Categoria::firstOrCreate(["nome" => $categoriaName])->id;
        }
        return $categoriasIds;
    }
}
