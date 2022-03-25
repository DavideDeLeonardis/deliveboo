<?php

use Illuminate\Database\Seeder;
use App\Model\Dish;
use App\Model\Order;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = Dish::all();

        foreach ($dishes as $dish) {
            $orders = Order::inRandomOrder()->first();
            $dish->orders()->attach(1, ['quantity' => random_int(1, 9)]);
            $dish->orders()->attach($orders);
        }
    }
}
