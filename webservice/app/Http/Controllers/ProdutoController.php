<?php

namespace MongeralAegonApi\Http\Controllers;

use Illuminate\Http\Request;
use MongeralAegonApi\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * M�todo que lista todos os produtos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Produto::all());
    }

    /**
     * M�todo que cria um novo produto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * M�todo que mostra as informa��es de um produto espec�fico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Produto::find(1));
    }

    /**
     * M�todo que atualiza um produto espec�fico
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
     * M�todo que remove um produto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
