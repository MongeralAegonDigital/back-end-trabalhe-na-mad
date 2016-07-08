<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */



Route::get("/", 'ProdutosAdminController@index');
Route::get("list", 'ProdutosController@listarProdutosJson');

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'produtos'], function(){

        Route::get("", ['as' => 'admin.produtos.index', 'uses' => 'ProdutosAdminController@index']);
        Route::post("", ['as' => 'admin.produtos.store', 'uses' => 'ProdutosAdminController@store']);
        Route::put("/{id}", ['as' => 'admin.produtos.update', 'uses' => 'ProdutosAdminController@update']);
        Route::get("/{id}", ['as' => 'admin.produtos.delete', 'uses' => 'ProdutosAdminController@destroy']);
        Route::get("/{id}/editar", ['as' => 'admin.produtos.edit', 'uses' => 'ProdutosAdminController@edit']);
    });
});

