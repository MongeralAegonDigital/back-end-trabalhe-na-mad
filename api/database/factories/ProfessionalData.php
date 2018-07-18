<?php

use Faker\Generator as Faker;
use App\MaritalStatus;
use App\WorkCategory;

$factory->define(\App\ProfessionalData::class, function (Faker $faker) {
    return [
        'rg' => $faker->rg,
        'issuing_agency' => $faker->sentence,
        'actual_job' => $faker->company,
        'number' => $faker->numberBetween(),
        'profession' => $faker->jobTitle,
        'gross_income' => $faker->randomFloat(2, 300, 100000),
        'marital_status_id' => MaritalStatus::all()->random()->first()->id,
        'work_category_id' => WorkCategory::all()->random()->first()->id
    ];
});
