<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@sehhati.dz'], [
            'name' => 'مدير المنصة',
            'password' => Hash::make('password'),
            'phone' => '0555000000',
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
