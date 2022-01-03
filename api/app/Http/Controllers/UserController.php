<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $list = $this->userService->getAll();
        return response()->json($list, Response::HTTP_OK);
    }

    public function store(UserRequest $request): JsonResponse
    {
        $this->userService->create($request->all());
        return response()->json(Response::HTTP_CREATED);
    }

    public function emailIsUnique(string $email): JsonResponse
    {
        $validation = $this->userService->emailIsUnique($email);
        return response()->json($validation, Response::HTTP_OK);
    }

    public function cpfIsValid(string $cpf): JsonResponse
    {
        $validation = $this->userService->cpfIsValid($cpf);
        return response()->json($validation, Response::HTTP_OK);
    }
}
