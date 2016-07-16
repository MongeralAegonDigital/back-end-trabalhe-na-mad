<?php

//Define a rota para a p�gina inicial da API
Route::get('/', function () {
    return view('welcome');
});

//Define a rota para a API
Route::group(['prefix'=>'api', 'as'=>'api::'], function(){
	
	//Define a rota para �rea de produto
	//Mais detalhes acesse o link: https://laravel.com/docs/5.2/controllers#restful-resource-controllers
	Route::resource('produto', 'ProdutoController');
	
	//Define a rota para �rea de categorias
	Route::resource('categoria', 'CategoriaController');
	
});
