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

$factory->define(App\CategoriaProduto::class, function (Faker\Generator $faker) {

    return [
        'id' => $faker->unique()->numberBetween(7, 9),
        'produto_id' => '1',
        'categoria_id' => '1',
    ];
});
