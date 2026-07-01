<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Government Documents',
                'description' => 'Services related to government document preparation and filing',
                'icon' => '📄',
            ],
            [
                'name' => 'Business Registration',
                'description' => 'Business registration and compliance services',
                'icon' => '🏢',
            ],
            [
                'name' => 'Legal Services',
                'description' => 'Legal documentation and consulting services',
                'icon' => '⚖️',
            ],
            [
                'name' => 'Finance & Taxation',
                'description' => 'Tax filing, accounting, and financial advisory services',
                'icon' => '💰',
            ],
            [
                'name' => 'Immigration',
                'description' => 'Visa, passport, and immigration services',
                'icon' => '✈️',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'icon' => $category['icon'],
                'is_active' => true,
                'meta_title' => $category['name'],
                'meta_description' => $category['description'],
            ]);
        }
    }
}
