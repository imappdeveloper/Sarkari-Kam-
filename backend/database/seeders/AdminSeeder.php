<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@saas.local',
            'password' => Hash::make('password'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        $user->assignRole('admin');

        Admin::create([
            'user_id' => $user->id,
            'department' => 'Management',
            'access_level' => 'super_admin',
            'activated_at' => now(),
        ]);
    }
}
