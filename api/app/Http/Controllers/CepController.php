<?php

namespace App\Http\Controllers;

use App\Services\CepService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CepController extends Controller
{
    private $cepService;

    public function __construct(CepService $cepService)
    {
        $this->cepService = $cepService;
    }

    public function getAddress(int $cep)
    {
        $address = $this->cepService->getAddress($cep);
        return response()->json($address, Response::HTTP_OK);
    }
}
