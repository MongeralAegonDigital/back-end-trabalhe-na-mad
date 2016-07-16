<?php

//Define a rota para a p�gina inicial da API
Route::get('/', function () {
    return "Bem Vindo a API!";
});

//Define a rota para a API
Route::group(['prefix'=>'api', 'as'=>'api::'], function(){
	
	//Defina a rota para �rea de produto
	//Mais detalhes acesse o link: https://laravel.com/docs/5.2/controllers#restful-resource-controllers
	Route::resource('produto','ProdutoController');
	
});
