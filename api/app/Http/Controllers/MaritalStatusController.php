<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MaritalStatusService;

class MaritalStatusController extends Controller
{
    private $service;
    
    public function __construct(MaritalStatusService $s) {
      $this->service = $s;
    }
    
    public function index()
    {
        return response()->json($this->service->index());
    }
}
