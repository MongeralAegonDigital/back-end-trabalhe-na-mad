<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $list = $this->categoryService->getAll();
        return response()->json($list, Response::HTTP_OK);
    }
}
