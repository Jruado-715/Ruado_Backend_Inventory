<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John Smith',      'email' => 'john@example.com',   'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jane Doe',        'email' => 'jane@example.com',   'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Carlos Rivera',   'email' => 'carlos@example.com', 'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maria Santos',    'email' => 'maria@example.com',  'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'James Reyes',     'email' => 'james@example.com',  'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anna Cruz',       'email' => 'anna@example.com',   'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mark Villanueva', 'email' => 'mark@example.com',   'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lisa Mendoza',    'email' => 'lisa@example.com',   'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ryan Torres',     'email' => 'ryan@example.com',   'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sofia Garcia',    'email' => 'sofia@example.com',  'password' => Hash::make('password123'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}