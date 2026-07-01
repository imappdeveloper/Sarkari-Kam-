<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date_of_birth' => $this->faker->dateOfBirth(),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => 'India',
            'postal_code' => $this->faker->postcode(),
            'preferred_language' => 'en',
            'marketing_consent' => false,
            'loyalty_points' => 0,
            'tier_level' => 'bronze',
        ];
    }
}
