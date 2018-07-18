<?php

use Faker\Generator as Faker;

$factory->define(\App\Address ::class, function (Faker $faker) {
    return [
        'cep' => $faker->postcode,
        'state' => $faker->state,
        'city' => $faker->city,
        'neighborhood' => $faker->streetName,
        'street' => $faker->streetAddress,
        'number' => $faker->numberBetween(1, 99),
        'complement' => $faker->paragraph(1, true)
    ];
});
