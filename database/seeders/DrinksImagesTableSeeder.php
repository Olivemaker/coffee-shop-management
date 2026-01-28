<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrinksImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('DrinksImages')->delete();
        
        \DB::table('DrinksImages')->insert(array (
            0 => 
            array (
                'id' => 13,
                'menu_id' => 13,
                'image_path' => 'menu/slice-fruit-near-herbs-glass-with-cocktail-straws.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 14,
                'menu_id' => 14,
                'image_path' => 'menu/glass-red-juice-marble.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 15,
                'menu_id' => 15,
                'image_path' => 'menu/delicious-drink-glass-with-straw.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 16,
                'menu_id' => 18,
                'image_path' => 'menu/delicious-drink-glass-with-straw.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 17,
                'menu_id' => 16,
                'image_path' => 'menu/smuzie-beries.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 19,
                'menu_id' => 4,
                'image_path' => 'menu/glass-cappuccino-with-cream.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 20,
                'menu_id' => 5,
                'image_path' => 'menu/orig.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 21,
                'menu_id' => 6,
                'image_path' => 'menu/latte.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 => 
            array (
                'id' => 27,
                'menu_id' => 48,
                'image_path' => 'menu/OpWFO7VBCnTmfAt5OO70O71IRj3YlyrL6hofPC2C.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 => 
            array (
                'id' => 28,
                'menu_id' => 49,
                'image_path' => 'menu/9wggfvjpkuRoDXWXohk9cD4vTFTL4ENJwOgUW0L1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 => 
            array (
                'id' => 29,
                'menu_id' => 7,
                'image_path' => 'menu/makro-svezii-kofe-s-molokom-i-saharom.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 => 
            array (
                'id' => 30,
                'menu_id' => 3,
                'image_path' => 'menu/caska-kofe-s-himeksom-na-stole.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 => 
            array (
                'id' => 31,
                'menu_id' => 10,
                'image_path' => 'menu/vid-sverhu-caska-caa-narezannyh-limonov-palocki-koricy-mandariny-v-zenskoi-ruke-na-serom-fone.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 => 
            array (
                'id' => 32,
                'menu_id' => 8,
                'image_path' => 'menu/vid-speredi-celoveka-nalivaa-cai-koncepcii.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 => 
            array (
                'id' => 33,
                'menu_id' => 11,
                'image_path' => 'menu/varen-e-iz-visni-s-visnei-caem-susenymi-travami-v-miske-na-tekstile-i-rozovom.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 => 
            array (
                'id' => 34,
                'menu_id' => 17,
                'image_path' => 'menu/stakan-dla-molocnogo-kokteila-s-persikom-i-klubnikoi-pod-vysokim-uglom.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 => 
            array (
                'id' => 35,
                'menu_id' => 9,
                'image_path' => 'menu/cai-vysokii-ugol-v-stakane-s-sosnovymi-vetkami.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 => 
            array (
                'id' => 36,
                'menu_id' => 54,
                'image_path' => 'menu/2Us5LBGVG1lxhZvyHuDNWDyxQFP7j0b0MT124Ou2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}