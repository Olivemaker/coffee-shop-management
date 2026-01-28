<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SesonalOffersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('SesonalOffers')->delete();
        
        \DB::table('SesonalOffers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'А ну остынь-ка!',
                'description' => 'Попробуйте.',
                'image_path' => 'menu/TK9uTJeVQ9rdPYZ8iS7Vs1Sqd4iniSDXRYxgJL3s.jpg',
                'style' => 'summer',
                'published' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Осеннее предложение',
                'description' => 'описание осеннего предложения',
                'image_path' => 'menu/c1oSpOzvNgX0dVdVq18PVc0nf6RkI3ljmCoKdoXe.jpg',
                'style' => 'autumn',
                'published' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Зимнее предложение.',
                'description' => 'описание зимнего предложения.',
                'image_path' => 'menu/SfDABcabC2siiDbGgjoQHa41CCY60vLVAh3ffl2d.jpg',
                'style' => 'winter',
                'published' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Сыр и тыквы',
                'description' => 'В дождливую холодную осень в печаль впадают все. Вокруг холодно и сыро....
Подними настроение нашими новыми напитками:
Тыквенный Латте
Сырный Раф',
                'image_path' => 'menu/uZN9bVoJrbRSv598zEi8ZNqV88DyyQ6SLapc7PFS.jpg',
                'style' => 'spring',
                'published' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}