<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'RG' => $this->faker->numberBetween(500000000, 600000000),
            'number' => $this->faker->numberBetween(500000, 600000),
            'ship_date' => $this->faker->date('Y-m-d'),
            'issuing_body' => 'Detran',
            'marital_status' => 'Single',
            'category_id' => '1',
            'profession' => 'Developer',
            'salary' => 12000,
        ];
    }
}
