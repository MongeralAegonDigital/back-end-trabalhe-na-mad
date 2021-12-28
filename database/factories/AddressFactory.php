<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cep' => $this->faker->numberBetween(50000000, 60000000),
            'public_area' => $this->faker->address(),
            'number' => $this->faker->numberBetween(1, 200),
            'complement' => $this->faker->streetAddress(),
            'district' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'state' => $this->faker->citySuffix(),
        ];
    }
}
