<?php

namespace App\Http\Controllers;

use App\Events\CreateClient;
use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;

class ClientController extends Controller
{
    /*
     * Metodo que recebe a requisição de cadastro de novo cliente
     * Dispara evento que faz o insert na base
     * Dispara o evento que faz o envio do email, usando Mailtrap.io somo smtp faker
     */
    public function create(Request $request){
        $params = $request->all();

        \Event::fire( new CreateClient( $params ) );
        return ['success' => 'Cliente cadastrado com sucesso!'];
    }
}
