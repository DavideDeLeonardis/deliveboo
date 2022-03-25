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
            $quantity = random_int(1, 9);
            $orders = Order::inRandomOrder()->first();
            $dish->orders()->attach(1, ['quantity' => $quantity]);
            $dish->orders()->attach($orders);
        }
    }
}
