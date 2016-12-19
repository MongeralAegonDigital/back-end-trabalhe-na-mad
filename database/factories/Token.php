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

$factory->define(Laravel\Passport\Token::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'user_id' => null,
        'client_id' => null,
        'name' => null,
        'scopes' => null,
        'revoked' => false,
        'created_at' => null,
        'updated_at' => null,
        'expires_at' => null
    ];
});
