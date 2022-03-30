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
            [
                'name' => 'Carne',
            ],
            [
                'name' => 'Cinese',
            ],
            [
                'name' => 'Dessert',
            ],
            [
                'name' => 'Fast-food',
            ],
            [
                'name' => 'Giapponese',
            ],
            [
                'name' => 'Indiano',
            ],
            [
                'name' => 'Italiano',
            ],
            [
                'name' => 'Kebab',
            ],
            [
                'name' => 'Panini',
            ],
            [
                'name' => 'Pasta',
            ],
            [
                'name' => 'Pizza',
            ],
            [
                'name' => 'Poke',
            ],
            [
                'name' => 'Sushi',
            ],
            [
                'name' => 'Snack',
            ],
            [
                'name' => 'Insalate',
            ],
            [
                'name' => 'Mediterraneo',
            ],
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->save();
        }
    }
}
