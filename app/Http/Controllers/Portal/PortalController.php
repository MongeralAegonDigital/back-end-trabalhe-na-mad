<?php

namespace App\Http\Controllers\Portal;

use App\Models\Produtos;
use App\Models\User;
use App\Notifications\MailRevenda;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Mail\SendContato;
use Illuminate\Notifications\Notification;
use Mail;
use DB;



class PortalController extends Controller {

    // PAGINAS DO SITE
    public function index() {
        return view('portal.home');
    }



}
