<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Address\Address::class, function (Faker $faker) {
    $user = factory(App\Models\User\User::class)->create();

    return [
        'user_cpf' => $user->cpf,
        'cep' => $faker->randomNumber(9),
        'street' => str_random(10),
        'number' => $faker->randomNumber(3),
        'address2' => str_random(30),
        'neighbor' => str_random(15),
        'city' => str_random(8),
        'state' => str_random(2)
    ];
});
