<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WorkCategoryService;

class WorkCategoryController extends Controller
{
    private $service;
    
    public function __construct(WorkCategoryService $s) {
      $this->service = $s;
    }
    
    public function index()
    {
        return response()->json($this->service->index());
    }
}
