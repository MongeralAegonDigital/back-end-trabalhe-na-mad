<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;

class ClientController extends Controller
{
    private $service;
    
    public function __construct(ClientService $s) {
      $this->service = $s;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {      
        $client = $this->service->store($request->all());
        
        $mailService = new \App\Services\MailService();
        
        $content  = 'Parabéns '.$client->name.' você foi resgistrado. '
            . 'Agora vai lá, só isso mesmo.';
        
        if ($mailService->send(
                'Você foi registrado!',
                $content,
                $client->email
        )) {
            return response()->json([
                'data' => $client,
                'message' => 'Cliente registrado. Foi enviado um email confirmando.'
            ], 
            201);
        }

        return response()->json([
            'data' => $client,
            'message' => 'Cliente registrado. Não foi possível enviar um email confirmando..'
        ], 
        201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json($client->load('address', 'phones', 'professionalData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}