<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'category' => 'Government Documents',
                'name' => 'Aadhaar Card Application',
                'description' => 'Assistance in applying for Aadhaar card',
                'base_price' => 500,
                'estimated_days' => 7,
            ],
            [
                'category' => 'Government Documents',
                'name' => 'Passport Application',
                'description' => 'Help with passport application and processing',
                'base_price' => 1500,
                'estimated_days' => 14,
            ],
            [
                'category' => 'Business Registration',
                'name' => 'Company Registration',
                'description' => 'Complete company registration assistance',
                'base_price' => 5000,
                'estimated_days' => 21,
            ],
            [
                'category' => 'Legal Services',
                'name' => 'Contract Drafting',
                'description' => 'Professional contract drafting services',
                'base_price' => 2000,
                'estimated_days' => 5,
            ],
            [
                'category' => 'Finance & Taxation',
                'name' => 'ITR Filing',
                'description' => 'Income Tax Return filing assistance',
                'base_price' => 1000,
                'estimated_days' => 3,
            ],
        ];

        foreach ($services as $service) {
            $category = Category::where('name', $service['category'])->first();
            if ($category) {
                Service::create([
                    'category_id' => $category->id,
                    'name' => $service['name'],
                    'slug' => Str::slug($service['name']),
                    'description' => $service['description'],
                    'base_price' => $service['base_price'],
                    'price_unit' => 'flat',
                    'estimated_days' => $service['estimated_days'],
                    'is_active' => true,
                    'requires_form' => true,
                    'meta_title' => $service['name'],
                    'meta_description' => $service['description'],
                ]);
            }
        }
    }
}
