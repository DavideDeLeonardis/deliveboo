<?php

use Illuminate\Database\Seeder;
use App\Model\Order;
use App\Model\Payment;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $addresses = [
            'Piazza Umberto 47',
            'Via Calefati 11',
            'Via Roma 44',
        ];

        for ($i = 0; $i < 50; $i++) {
            $newOrder = new Order();
            $newOrder->payment_id = Payment::inRandomOrder()->first()->id;
            $newOrder->name = $faker->word();
            $newOrder->lastname = $faker->word();
            $newOrder->email = $faker->email();
            foreach ($addresses as $address) {
                $newOrder->address = $address;
            }
            $newOrder->date = $faker->date('Y_m_d');
            $newOrder->time = $faker->time();
            $newOrder->price_total = $faker->randomFloat(2, 5, 300);

            $newOrder->save();
        }
    }
}
