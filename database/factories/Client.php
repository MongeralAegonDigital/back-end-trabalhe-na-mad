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

$factory->define(Laravel\Passport\Client::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'user_id' => null,
        'name' => 'ApiClient',
        'secret' => null,
        'redirect' => 'http://localhost',
        'revoked' => false,
        'personal_access_client' => false,
        'password_client' => true,
    ];
});
