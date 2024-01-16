<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'points' => $faker->randomFloat(2, 10, 100),
                'quantity' => $faker->randomNumber(2),
                'created_by' => 3,
                'store_id' => 1,
                // Add more attributes as needed
            ]);
        }
    }
}
