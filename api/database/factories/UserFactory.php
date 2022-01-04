<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\PersonalData;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'cpf' => $this->faker->numberBetween(500000, 600000),
            'phone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date('Y-m-d'),
            'personal_data' => [
                PersonalData::factory()->make()
            ],
            'address' => [
                Address::factory()->make()
            ],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
