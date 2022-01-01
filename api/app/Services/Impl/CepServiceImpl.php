<?php

namespace App\Services\Impl;

use App\Services\CepService;
use Illuminate\Support\Facades\Http;

class CepServiceImpl implements CepService
{
    public function getAddress(int $cep)
    {

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get('https://api.postmon.com.br/v1/cep/' . $cep);
        return $response->json();
    }
}
