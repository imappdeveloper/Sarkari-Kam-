<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter',
                'price' => 99,
                'billing_cycle' => 'monthly',
                'max_users' => 1,
                'max_storage' => 5,
                'features' => ['Basic Support', 'API Access', '5 Orders/Month'],
                'is_popular' => false,
            ],
            [
                'name' => 'Professional',
                'price' => 299,
                'billing_cycle' => 'monthly',
                'max_users' => 5,
                'max_storage' => 50,
                'features' => ['Priority Support', 'API Access', 'Unlimited Orders', 'Analytics'],
                'is_popular' => true,
            ],
            [
                'name' => 'Enterprise',
                'price' => 999,
                'billing_cycle' => 'monthly',
                'max_users' => 100,
                'max_storage' => 500,
                'features' => ['24/7 Support', 'API Access', 'Unlimited Orders', 'Advanced Analytics', 'Dedicated Account Manager'],
                'is_popular' => false,
            ],
        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::create([
                'name' => $plan['name'],
                'slug' => Str::slug($plan['name']),
                'description' => $plan['name'] . ' Plan',
                'price' => $plan['price'],
                'billing_cycle' => $plan['billing_cycle'],
                'features' => $plan['features'],
                'max_users' => $plan['max_users'],
                'max_storage' => $plan['max_storage'],
                'status' => 'active',
                'is_popular' => $plan['is_popular'],
                'trial_days' => 7,
            ]);
        }
    }
}
