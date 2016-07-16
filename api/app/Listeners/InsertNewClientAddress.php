<?php

namespace App\Listeners;

use App\Address;
use App\Events\CreateClient;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertNewClientAddress
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

        $address = [
            'client_cpf' => $params['cpf'],
            'cep' => $params['endereco']['cep'],
            'logradouro' => $params['endereco']['logradouro'],
            'numero' => $params['endereco']['numero'],
            'complemento' => $params['endereco']['complemento'],
            'bairro' => $params['endereco']['bairro'],
            'cidade' => $params['endereco']['cidade'],
            'uf' => $params['endereco']['uf'],
        ];
        
        Address::create($address);
    }
}
