<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FoodPriceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('FoodPrice')->delete();
        
        \DB::table('FoodPrice')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 3,
                'price' => '100',
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 4,
                'price' => '100',
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 5,
                'price' => '100',
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 6,
                'price' => '150',
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 7,
                'price' => '100',
                'updated_at' => now(),
            ),
        ));
        
        
    }
}