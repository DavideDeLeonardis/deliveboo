<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Vegetariano',
            'Messicano',
            'Indiano',
            'Greco',
            'Giapponese',
            'Cinese',
            'Libanese',
            'Americano',
            'Italiano',
            'Thailandese',
            'Sushi',
            'Pizza',
            'Dolci',
            'Kebab',
            'Pasta',
            'Sushi',
            'Poke',
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
