<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Dish;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $dishes = [
        //     [
        //         'name' => 'Margherita',
        //         'description' =>
        //             'La pizza Margherita è la tipica pizza napoletana, condita con pomodoro, mozzarella (tradizionalmente è usato il fior di latte, non quella di bufala), basilico fresco, sale e olio; è, assieme alla pizza marinara, la più popolare pizza italiana.',
        //         'ingredients' => ['pomodoro', 'mozzarella'],
        //         'price' => 6.0,
        //         'availability' => true,
        //         'course' => 'pizza',
        //     ],
        //     [
        //         'name' => 'Diavola',
        //         'description' =>
        //             'Tipica in diverse cucine regionali italiane, è divenuta famosa come specialità della cucina napoletana. La città di Napoli ha svolto infatti un ruolo importantissimo nella storia della pizza, creando ed esportando questa specialità che è ora la più diffusa nel mondo',
        //         'ingredients' => [
        //             'pomodoro',
        //             'mozzarella',
        //             'salame piccante',
        //             'origano',
        //         ],
        //         'price' => 8.0,
        //         'availability' => true,
        //         'course' => 'pizza',
        //     ],
        //     [
        //         'name' => 'Spaghetti alla Carbonara',
        //         'description' =>
        //             'La pasta alla carbonara è un piatto caratteristico del Lazio, e più in particolare di Roma, preparato con ingredienti popolari e dal gusto intenso',
        //         'ingredients' => [
        //             'spaghetti',
        //             'guanciale',
        //             'uova',
        //             'pecorino',
        //             'pepe',
        //         ],
        //         'price' => 10.0,
        //         'availability' => true,
        //         'course' => 'primi',
        //     ],
        //     [
        //         'name' => 'Spaghetti Cacio e Pepe',
        //         'description' =>
        //             'Il cacio e pepe è un piatto caratteristico del Lazio. Come suggerisce il nome, gli ingredienti sono molto semplici e includono solo pepe nero, formaggio pecorino romano e pasta',
        //         'ingredients' => ['spaghetti', 'pepe', 'pecorino'],
        //         'price' => 10.0,
        //         'availability' => true,
        //         'course' => 'primi',
        //     ],
        // ];

        // test seeding
        for ($i = 0; $i < 150; $i++) {
            $newDish = new Dish();
            $newDish->user_id = User::inRandomOrder()->first()->id;
            $newDish->name = $faker->words(2, true);
            $newDish->description = $faker->paragraphs(5, true);
            $newDish->ingredients = $faker->words(4, true);
            $newDish->image = $faker->imageUrl(640, 480, 'food', true);
            $newDish->price = $faker->randomFloat(2, 5, 100);
            $newDish->availability = $faker->boolean();
            $newDish->course = $faker->words(1, true);

            $newDish-> save();
        }
    }
}
