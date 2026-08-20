<?php

namespace Database\Seeders;

use App\Constans\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sebastian Skubała',
            'email' => 'admin@firma.pl',
            'role_id' => Role::ADMIN,
            'password' => bcrypt('haslo123'),
        ]);

        User::create([
            'name' => 'Wojtek Krawczyk',
            'email' => 'pracownik@firma.pl',
            'role_id' => Role::USER,
            'password' => bcrypt('haslo123'),
        ]);

    }
}
