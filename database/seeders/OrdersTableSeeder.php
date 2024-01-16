<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {

        for ($i = 0; $i < 10; $i++) {
            $order = Order::create([
                'customer_id'   => 7,
                'store_id'      => 1,
                'order_date'    => now(),
                'order_total'   => $faker->randomFloat(2, 10, 100),
                'status'        => 'completed',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
            OrderItem::create([
                'order_id'      => $order->id,
                'product_id'    => 2,
                'quantity'      => rand(1,2),
                'points'        => $faker->randomFloat(2, 5, 100),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

    }
}
