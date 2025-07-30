<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'admin@barber.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Create manajer user if not exists
        User::firstOrCreate(
            ['email' => 'manajer@barber.com'],
            [
                'name' => 'Manajer',
                'password' => bcrypt('password'),
                'role' => 'manajer',
            ]
        );

        // Create pelanggan user if not exists
        User::firstOrCreate(
            ['email' => 'pelanggan@barber.com'],
            [
                'name' => 'Pelanggan',
                'password' => bcrypt('password'),
                'role' => 'pelanggan',
            ]
        );
    }
}
