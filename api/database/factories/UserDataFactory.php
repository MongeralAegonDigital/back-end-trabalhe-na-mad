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

$factory->define(App\Models\User\Data::class, function (Faker $faker) {
    $user = factory(App\Models\User\User::class)->create();

    return [
        'user_cpf' => $user->cpf,
        'rg' => $faker->randomNumber(8),
        'date_expedition' => $faker->dateTimeAD,
        'org' => str_random(10),
        'marital_status' => str_random(10),
        'category' => str_random(10),
        'company' => "Outros",
        'occupation' => str_random(10),
        'salary' => $faker->randomNumber(5),
    ];
});
