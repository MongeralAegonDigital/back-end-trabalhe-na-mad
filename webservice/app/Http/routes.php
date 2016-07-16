<?php

//Define a rota para a p�gina inicial da API
Route::get('/', function () {
    return "Bem Vindo a API!";
});

//Define a rota para a API
Route::group(['prefix'=>'api', 'as'=>'api::'], function(){
	
	//Defina a rota para �rea de produto
	Route::group(['prefix'=>'produto', 'as'=>'produto::'], function(){
		
		//Define a rota para listar todos os produtos
		Route::get('/', ['as'=>'listartodos', 'uses'=>'ProdutoController@index']);
		
		//Define a rota para a visualiza��o dos dados de um produto espec�fico
		Route::get('{id}', ['as'=>'', 'uses'=>'ProdutoController@show'])->where(['id'=>'[0-9]+']);
		
		//Define a rota para o cadastro de um produto
		Route::post('cadastrar', ['as'=>'cadastrar', 'uses'=>'ProdutoController@store']);
		
		//Define a rota para a atualiza��o dos dados de um produto
		Route::put('atualizar/{id}', ['as'=>'atualizar', 'uses'=>'ProdutoController@update'])->where(['id'=>'[0-9]+']);
		
		//Define a rota para a exclus�o de um produto
		Route::delete('remover/{id}', ['as'=>'remover', 'uses'=>'ProdutoController@destroy'])->where(['id'=>'[0-9]+']);
	
	});
	
});
