<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Recupera todos os produtos
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function produtos()
    {
        return Produto::All();
    }

    /**
     * Recupera o produto pelo id
     * @param $id
     * @return Produto
     */
    public function show($id):Produto
    {
        return Produto::find($id);
    }

    /**
     * Recupera o produto pelo id
     * @param $id
     * @return Produto
     */
    public function update($id):Produto
    {
        $input = Input::all();

        $produto = $this->show($id);
        $produto->setRawAttributes($input);

        $produto->save();

        return $produto;
    }

    /**
     * Deleta o produto pelo id
     * @param $id
     * @return Produto
     */
    public function destroy($id)
    {
        Produto::destroy($id);
        return ['bool' => true];
    }
}
