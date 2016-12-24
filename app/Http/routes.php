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

Route::get('/', function () {

	//array_add()
	$array = ['nome'=>'Camila','idade'=>'20'];
	$array = array_add($array,'email','camila@mail.com');
	$array = array_add($array,'amigo','Guilherme');
	//dd($array);

	// array_collapse()
	$array = [['banana','limão'],['vermelho','azul']];
	$array = array_collapse($array);
	//dd($array);

	//array_divide()
	list($key,$value) = array_divide(['nome'=>'Camila','idade'=>'20']);
	//dd($key,$value);

	//array_except()
	$array = ['nome'=>'Camila','idade'=>'20'];
	$array = array_except($array,['nome']);
	//dd($array);

	//base_path()
	$path = base_path('Config');
	//dd($path);

	//database_path()
	$path = database_path();
	//dd($path);

	//public_path()
	$path = public_path();
	//dd($path);

	//storage_path()
	$path = storage_path();
	//dd($path);

	//camel_case()
	$text = "Guilherme esta criando uma nova aula";
	//dd(camel_case($text));

	//snake_case()
	$text = "GuilhermeEstaCriandoUmaNovaAula";
	//dd(snake_case($text));

	//str_limit()
	$text = "Guilherme esta criando uma nova aula";
	//dd(str_limit($text,5));





    return view('welcome');
});

Route::auth();

Route::get('/cliente', ['uses'=>'ClienteController@index','as'=>'cliente.index']);
Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar','as'=>'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@salvar','as'=>'cliente.salvar']);
Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@editar','as'=>'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@atualizar','as'=>'cliente.atualizar']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@deletar','as'=>'cliente.deletar']);

Route::get('/cliente/detalhe/{id}',['uses'=>'ClienteController@detalhe','as'=>'cliente.detalhe']);
Route::get('/telefone/adicionar/{id}',['uses'=>'TelefoneController@adicionar','as'=>'telefone.adicionar']);
Route::post('/telefone/salvar/{id}',['uses'=>'TelefoneController@salvar','as'=>'telefone.salvar']);

Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar','as'=>'telefone.editar']);
Route::put('/telefone/atualizar/{id}', ['uses'=>'TelefoneController@atualizar','as'=>'telefone.atualizar']);
Route::get('/telefone/deletar/{id}', ['uses'=>'TelefoneController@deletar','as'=>'telefone.deletar']);