<?php

namespace MongeralAegonApi\Http\Controllers;

use Illuminate\Http\Request;
use MongeralAegonApi\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Método que lista todos os produtos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Produto::all());
    }

    /**
     * Método que cria um novo produto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Método que mostra as informações de um produto específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Produto::find(1));
    }

    /**
     * Método que atualiza um produto específico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Método que remove um produto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
