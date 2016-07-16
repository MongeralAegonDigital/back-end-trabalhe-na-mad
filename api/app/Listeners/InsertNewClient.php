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

        $client = [
            'cpf' => $params['cpf'],
            'nome' => $params['nome'],
            'senha' => bcrypt($params['senha']),
            'telefone' => $params['telefone'],
            'email' => $params['email'],
            'dataNascimento' => $params['dataNascimento']
        ];

        Client::create($client);
    }
}
