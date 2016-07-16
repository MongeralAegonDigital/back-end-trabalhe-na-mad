<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/* $factory->define(MongeralAegonApi\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
}); */

//Gera dados aleatórios na tabela produtos  
$factory->define(MongeralAegonApi\Models\Produto::class, function(Faker\Generator $faker){
	return [
		'nome' => $faker->name,
		'data_fabricacao' => $faker->dateTime,
		'tamanho' => 10.25,
		'largura' => 1.5,
		'peso' => 100
	];
});

//gera algumas categorias para teste
$factory->define(MongeralAegonApi\Models\Categoria::class, function(Faker\Generator $faker){
	return [
		'nome' => $faker->colorName	
	];
});