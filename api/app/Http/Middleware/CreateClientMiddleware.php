<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Validation\ValidatesRequests;


class CreateClientMiddleware
{
    use ValidatesRequests;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //dd($request->all());
        $this->validate($request, [
            'cpf' => 'required|max:11',
            'email' => 'email|required|max:100',
            'nome' => 'required|max:100',
            'senha' => 'required|max:50',
            'telefone' => 'required|max:16',
            'dataNascimento' => 'required|max:10',
            'endereco.cep' => 'required|max:10',
            'endereco.logradouro' => 'required|max:100',
            'endereco.numero' => 'required|max:10',
            'endereco.complemento' => 'max:100|max:100',
            'endereco.bairro' => 'required|max:50',
            'endereco.cidade' => 'required|max:50',
            'endereco.uf' => 'required|max:2',
            'rg' => 'required|max:4',
            'numeroRg' => 'required|max:10',
            'dataRg' => 'required|max:10',
            'orgaoRg' => 'required|max:15',
            'estadoCivil' => 'required|max:10',
            'categoria' => 'required|max:15',
            'empresa' => 'max:50',
            'profissao' => 'required|max:50',
            'renda' => 'required|max:12'

        ]);

        return $next($request);
    }
}
