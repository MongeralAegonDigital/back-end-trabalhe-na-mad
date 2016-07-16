<?php
/*
 * Rota para cadastro de novo cliente, passando por um Middleware de validação
 */
Route::group(['prefix' => 'client'], function(){
    Route::post('/', ['middleware' => 'createClient', 'as' => 'create', 'uses' => 'ClientController@create']);
});
