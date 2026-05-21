<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'مدير المنصة',
            'email' => 'admin@sehhati.dz',
            'password' => Hash::make('password'),
            'phone' => '0555000000',
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
