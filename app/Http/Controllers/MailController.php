<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SucessoCadastro;

class MailController extends Controller
{
    public function sendMail(Request $request)
	{
		$mail = $request->get('email');
	
		Mail::to($mail)->send(new SucessoCadastro);
	
		return redirect('person');
	}
}
