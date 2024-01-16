<?php

namespace Database\Seeders;

use App\Models\Store;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $store = Store::create([
                'name' => $faker->name,
                'number' => $faker->randomNumber(5),
                'street' => $faker->address(),
                'town' => $faker->city(),
                'postal_code' => $faker->unique()->randomNumber(5),
                'mobile_number' => $faker->phoneNumber,
                'description' => $faker->sentence(),
                'partner_id' => 3,
            ]);

        }
    }
}
