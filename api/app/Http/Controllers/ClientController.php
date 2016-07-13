<?php

namespace App\Http\Controllers;

use App\Events\CreateClient;
use App\Events\Event;
use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;

class ClientController extends Controller
{
    public function create(Request $request){
        $params = $request->all();

        
        Event::fire( new CreateClient( $params ) );
        return $request->input();
    }
}
