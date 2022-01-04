<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CepController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/emailIsUnique/{email}', [UserController::class, 'emailIsUnique']);
Route::get('/users/cpfIsValid/{cpf}', [UserController::class, 'cpfIsValid']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/cep/getAddress/{cep}', [CepController::class, 'getAddress']);
