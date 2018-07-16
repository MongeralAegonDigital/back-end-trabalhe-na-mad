<?php

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

Route::middleware('api')->prefix('v1/desafio')->group(function () {
    
    Route::apiResource('clients','ClientController');
    Route::post('/mails/send', 'EmailController@send');
    
});
