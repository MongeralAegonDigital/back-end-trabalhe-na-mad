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

        Mail::send('emails.newClient', ['client' => $params], function ($m) use ($params) {
            $m->from('277c86c0d8-4bfc88@inbox.mailtrap.io', 'Test Mongeral');

            $m->to($params['email'], $params['nome'])->subject('Bem vindo');
        });
    }
}
