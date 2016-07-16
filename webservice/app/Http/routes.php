<?php

//Define a rota para a página inicial da API
Route::get('/', function () {
    return view('welcome');
});

//Define a rota para a API
Route::group(['prefix'=>'api', 'as'=>'api::'], function(){
	
	//Define a rota para área de produto
	//Mais detalhes acesse o link: https://laravel.com/docs/5.2/controllers#restful-resource-controllers
	Route::resource('produto', 'ProdutoController');
	
	//Define a rota para área de categorias
	Route::resource('categoria', 'CategoriaController');
	
});
