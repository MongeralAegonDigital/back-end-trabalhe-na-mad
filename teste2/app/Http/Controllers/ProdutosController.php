<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produto;
use App\Http\Controllers\Controller;


class ProdutosController extends Controller
{
    public function index(){

        $produtos = \App\Produto::all();
        return view("produtos.index", compact('produtos'));

    }
}
