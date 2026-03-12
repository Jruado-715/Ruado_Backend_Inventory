<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Laptop Pro',          'category' => 'Electronics', 'stock' => 15, 'price' => 49999, 'img' => '💻', 'trend' => '+5%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wireless Mouse',      'category' => 'Peripherals', 'stock' => 42, 'price' => 1299,  'img' => '🖱️', 'trend' => '+2%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mechanical Keyboard', 'category' => 'Peripherals', 'stock' => 20, 'price' => 3500,  'img' => '⌨️', 'trend' => '+8%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Office Chair',        'category' => 'Furniture',   'stock' => 8,  'price' => 12500, 'img' => '🪑', 'trend' => '-1%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Standing Desk',       'category' => 'Furniture',   'stock' => 5,  'price' => 25000, 'img' => '🪵', 'trend' => '+3%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monitor 27"',         'category' => 'Electronics', 'stock' => 12, 'price' => 18999, 'img' => '🖥️', 'trend' => '+6%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'USB-C Hub',           'category' => 'Peripherals', 'stock' => 35, 'price' => 2199,  'img' => '🔌', 'trend' => '+1%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Webcam HD',           'category' => 'Electronics', 'stock' => 18, 'price' => 4500,  'img' => '📷', 'trend' => '+4%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desk Lamp',           'category' => 'Furniture',   'stock' => 25, 'price' => 1800,  'img' => '💡', 'trend' => '+2%', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Headphones Pro',      'category' => 'Electronics', 'stock' => 10, 'price' => 8999,  'img' => '🎧', 'trend' => '+7%', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}