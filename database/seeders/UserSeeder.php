<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'email' => 'admin@tshirt-store.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Dupont',
            'first_name' => 'Jean',
            'email' => 'client@tshirt-store.test',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '+32 470 12 34 56',
            'address' => 'Rue de la Loi 16',
            'city' => 'Bruxelles',
            'postal_code' => '1000',
            'country' => 'Belgique',
            'email_verified_at' => now(),
        ]);

        User::factory(5)->create();
    }
}
