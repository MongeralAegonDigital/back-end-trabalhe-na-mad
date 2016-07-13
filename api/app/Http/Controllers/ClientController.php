<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Client;
use App\Http\Requests;

class ClientController extends Controller
{
    public function create(Request $request){

        $this->sendEmailReminder();
        return $request->input();
    }

    public function sendEmailReminder()
    {
        $client = Client::find(13914411767);

        Mail::send('emails.newClient', ['client' => $client->nome], function ($m) use ($client) {
            $m->from('277c86c0d8-4bfc88@inbox.mailtrap.io', 'Test Mongeral');

            $m->to('marques.m05@gmail.com', $client->nome)->subject('Bem vindo');
        });
    }
}
