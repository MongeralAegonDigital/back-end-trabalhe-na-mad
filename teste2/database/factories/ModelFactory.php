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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Produto::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'data_fabricacao' => $faker->date,
        'tamanho' => $faker->numberBetween(1,100),
        'largura' => $faker->numberBetween(1,100),
        'peso' => $faker->numberBetween(1,100)
    ];
});

$factory->define(App\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word
    ];
});
