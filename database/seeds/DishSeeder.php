<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Dish;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 0; $i < 150; $i++) {
        //     $newDish = new Dish();
        //     $newDish->user_id = User::inRandomOrder()->first()->id;
        //     $newDish->name = $faker->words(2, true);
        //     $newDish->slug = Str::slug("$newDish->name-$i", '-');
        //     $newDish->description = $faker->paragraphs(5, true);
        //     $newDish->ingredients = $faker->words(4, true);
        //     $newDish->image = 'https://www.ansa.it/crop/crop.php?file=https://www.ansa.it/webimages/cl_1100x/2020/8/5/7f6450dc6002a319e35f1ad411ebdcab.jpg&w=1100&h=600&face=Detection&c=1FCZxBx9yEHvx04rW0JVlQ';
        //     $newDish->price = $faker->randomFloat(2, 5, 100);
        //     $newDish->availability = $faker->boolean();
        //     $newDish->course = $faker->words(1, true);

        //     $newDish->save();
        // }
        $i = 0;
        foreach (config('dishes') as $dish) {
            $newDish = new Dish();
            $newDish->user_id = User::inRandomOrder()->first()->id;
            $newDish->name = $dish['name'];
            $newDish->slug = Str::slug("$newDish->name-$i", '-');
            $newDish->description = $dish['description'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->image = null;
            $newDish->price = $dish['price'];
            $newDish->availability = $dish['availability'];
            $newDish->course = $dish['course'];
            $newDish->save();
            $i++;
        }
    }
}
