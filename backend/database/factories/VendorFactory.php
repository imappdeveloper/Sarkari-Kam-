<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company(),
            'company_description' => $this->faker->paragraph(),
            'business_registration_number' => $this->faker->unique()->numerify('BR-#########'),
            'tax_id' => $this->faker->unique()->numerify('TAX-#########'),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => 'India',
            'postal_code' => $this->faker->postcode(),
            'bank_account' => $this->faker->numerify('####################'),
            'bank_code' => $this->faker->numerify('####'),
            'commission_rate' => 10,
            'status' => 'active',
            'verified_at' => now(),
        ];
    }
}
