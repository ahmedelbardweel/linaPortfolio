<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'admin@lina.design')->exists()) {
            User::create([
                'name'     => 'Admin',
                'email'    => 'admin@lina.design',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
            ]);
        }
    }
}
