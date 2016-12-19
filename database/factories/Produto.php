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

$factory->define(App\Produto::class, function (Faker\Generator $faker) {

    return [
        'id' => $faker->unique()->numberBetween(1, 3),
        'nome' => $faker->name,
        'data_fabricacao' => $faker->date(),
        'tamanho' => random_int(1, 10),
        'largura' => random_int(1, 10),
        'peso' => random_int(1, 10),
    ];
});
