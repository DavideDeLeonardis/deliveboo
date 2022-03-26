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
            'Vegetariano', //
            'Messicano', //
            'Indiano', //
            'Greco', //
            'Giapponese', //
            'Cinese', //
            'Libanese', //
            'Americano', //
            'Italiano', //
            'Thailandese', //
            'Sushi', //
            'Pizza', //
            'Dolci', //
            'Kebab', //
            'Pasta', //
            'Poke', //
        ];

        $images = [
            'https://www.develey.it/wp-content/uploads/2018/12/shutterstock_623007527.jpg', //vegetariano
            'https://www.viaggiaregratis.eu/wp-content/uploads/2020/11/Cucina-Messicana.jpg', //messicano
            'https://cdn.diredonna.it/app/uploads/2019/05/07154549/B7uRFjcw20190507014547_5e36131ae5e9d4975687d40c6e9818ae20190507014548_0d2edec7a1ea7e5f5e06f87338b42af1-980x480.jpeg', //indiano
            'https://www.archetravel.com/wp-content/uploads/2020/03/grecia-cucina_inside-620x245.jpg', //greco
            'https://hhwt-images-upload.s3.ap-southeast-1.amazonaws.com/lg_1615649648105_halal_japanese_in_kl.jpg', //giapponese
            'https://www.giallozafferano.it/images/speciali/2704/involtini_primavera_600x500.jpg', //cinese
            'https://hhwt-images-upload.s3.ap-southeast-1.amazonaws.com/lg_1615649648105_halal_japanese_in_kl.jpg', //libanese
            'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/798104191/uno-pizzeria-whole-hog-burger.jpg?quality=82&strip=1', //americano
            'https://www.gazzettadelgusto.it/wp-content/uploads/2020/12/Cucina-italiana-all-estero-amata-ma-sconosciuta-e-contraffatta.jpg', //italiano
            'https://www.viaggiaregratis.eu/wp-content/uploads/2020/12/Cibo-cucina-thailandese.jpg', //thailandese
            'https://static.gamberorosso.it/2022/01/sushi-scaled.jpeg', //sushi
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeih7Ti6BTQPEmpQdIZjxnnuDIBWpikU_uEQ&usqp=CAU', //pizza
            'https://www.aiafood.com/sites/default/files/styles/scale_1920/public/articles/ricette-dolci-25-aprile.jpg?itok=L1QU8D9x', //dolci
            'https://d2lxis1uiqe6st.cloudfront.net/wp-content/uploads/2019/06/segerti_0002_kebab-napoli.jpg.png', //kebab
            'https://www.giallozafferano.it/images/244-24489/Spaghetti-alla-Carbonara_600x500.jpg', //pasta
            'https://broburger.it/wp-content/uploads/2020/02/poke-salmone.jpg', //poke
        ];

        // foreach ($categories as $category) {
        //     $newCategory = new Category();
        //     $newCategory->name = $category;
        //     $newCategory->save();
        // }
        for ($i = 0; $i < 16; $i++) {
            $newCategory = new Category();
            $newCategory->name = $categories[$i];
            $newCategory->image = $images[$i];
            $newCategory->save();
        }
    }
}
