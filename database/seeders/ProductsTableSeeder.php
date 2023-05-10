<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Laptop',
                'price' => 999.99,
                'description' => 'A powerful laptop with 16GB RAM and 512GB SSD',
                'image' => 'images/Laptop.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Headphone',
                'price' => 89.99,
                'description' => 'A pair of wireless headphones with noise cancellation',
                'image' => 'images/Headphone.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Mouse',
                'price' => 29.99,
                'description' => 'A wireless mouse with ergonomic design and long battery life',
                'image' => 'images/Mouse.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

}
