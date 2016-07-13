<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Client;
use App\Http\Requests;

class ClientController extends Controller
{
    public function create(Request $request){
        return $request->input();
    }

    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}
