<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_number' => 'ORD-' . $this->faker->unique()->numerify('##########'),
            'price' => $this->faker->numberBetween(1000, 50000),
            'currency' => 'INR',
            'payment_status' => 'pending',
            'order_status' => 'pending',
            'escrow_status' => 'pending',
            'delivery_date' => now()->addDays(random_int(1, 30)),
        ];
    }
}
