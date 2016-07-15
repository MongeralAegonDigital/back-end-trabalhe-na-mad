<?php

namespace App\Listeners;

use App\Events\CreateClient;
use App\Profile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertNewClientProfile
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

        $profile = [
            'client_cpf' => $params['cpf'],
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

        Profile::create($profile);
    }
}
