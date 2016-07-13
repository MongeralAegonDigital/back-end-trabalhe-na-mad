<?php

namespace App\Listeners;

use App\Events\CreateClient;
use Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToNewClient
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

        $client = $params;

        Mail::send('emails.newClient', ['client' => $client], function ($m) use ($client) {
            $m->from('277c86c0d8-4bfc88@inbox.mailtrap.io', 'Test Mongeral');

            $m->to($client->email, $client->nome)->subject('Bem vindo');
        });
    }
}
