<?php

namespace App\Listeners;

use App\Client;
use App\Events\CreateClient;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertNewClient
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateClient  $event
     * @return void
     */
    public function handle(CreateClient $event)
    {
        $params = $event->getParams();

        $attributes = [
            'cpf' => $params['cpf'],
            'nome' => $params['nome'],
            'senha' => bcrypt($params['senha']),
            'telefone' => $params['telefone'],
            'email' => $params['email'],
            'dataNascimento' => $params['dataNascimento'],
            'cep' => $params['endereco']['cep'],
            'logradouro' => $params['endereco']['logradouro'],
            'numero' => $params['endereco']['numero'],
            'complemento' => $params['endereco']['complemento'],
            'bairro' => $params['endereco']['bairro'],
            'cidade' => $params['endereco']['cidade'],
            'uf' => $params['endereco']['uf'],
            'rg' => $params['endereco']['uf'],
            'numeroRg' => $params['numeroRg'],
            'dataRg' => $params['dataRg'],
            'orgaoRg' => $params['orgaoRg'],
            'estadoCivil' => $params['estadoCivil'],
            'categoria' => $params['categoria'],
            'empresa' => $params['empresa'],
            'profissao' => $params['profissao'],
            'renda' => $params['renda']
        ];

        Client::create($attributes);
    }
}
