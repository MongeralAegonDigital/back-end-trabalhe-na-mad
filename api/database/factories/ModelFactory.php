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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Category::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(\App\Product::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->streetName,
        'fabrication_date' => $faker->dateTime,
        'size' => $faker->randomFloat(1,5,0.01),
        'lenght' => $faker->randomFloat(1,5,0.01),
        'weight' => $faker->randomFloat(1,5,0.01),
    ];
});