<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produtos;

class ProdutosApi extends Controller
{



    public function list(){

        $produtos  = Produtos::all();

        return $produtos->toJson();
    }



}
