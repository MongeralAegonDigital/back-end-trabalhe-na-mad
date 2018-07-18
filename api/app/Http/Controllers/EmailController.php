<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService;

class EmailController extends Controller
{
    private $service;
    
    public function __construct(MailService $s) {
      $this->service = $s;
    }
    
    public function send(Request $request)
    {
        $this->service->send($request->title, $request->content);
        return response()->json('Email enviado com sucesso', 200);        
    }
}
