<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default admin user
        DB::table('users')->insert([
            'name' => 'slider User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hash the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create multiple dummy users
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'), // Hash the password
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
