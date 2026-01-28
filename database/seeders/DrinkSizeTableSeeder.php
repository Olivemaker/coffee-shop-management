<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrinkSizeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('DrinkSize')->delete();
        
        \DB::table('DrinkSize')->insert(array (
            0 => 
            array (
                'id' => 7,
                'menu_id' => 13,
                'size' => 'M',
                'price' => '300',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 8,
                'menu_id' => 13,
                'size' => 'L',
                'price' => '400',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 12,
                'menu_id' => 3,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 13,
                'menu_id' => 3,
                'size' => 'M',
                'price' => '170',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 14,
                'menu_id' => 3,
                'size' => 'L',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 24,
                'menu_id' => 6,
                'size' => 'S',
                'price' => '120',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 25,
                'menu_id' => 6,
                'size' => 'M',
                'price' => '170',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 26,
                'menu_id' => 6,
                'size' => 'L',
                'price' => '210',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 => 
            array (
                'id' => 27,
                'menu_id' => 4,
                'size' => 'S',
                'price' => '100',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 => 
            array (
                'id' => 28,
                'menu_id' => 4,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 => 
            array (
                'id' => 29,
                'menu_id' => 4,
                'size' => 'L',
                'price' => '300',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 => 
            array (
                'id' => 30,
                'menu_id' => 5,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 => 
            array (
                'id' => 31,
                'menu_id' => 5,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 => 
            array (
                'id' => 32,
                'menu_id' => 5,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 => 
            array (
                'id' => 33,
                'menu_id' => 14,
                'size' => 'S',
                'price' => '120',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 => 
            array (
                'id' => 34,
                'menu_id' => 14,
                'size' => 'M',
                'price' => '170',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 => 
            array (
                'id' => 35,
                'menu_id' => 14,
                'size' => 'L',
                'price' => '210',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 => 
            array (
                'id' => 36,
                'menu_id' => 15,
                'size' => 'S',
                'price' => '100',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 => 
            array (
                'id' => 37,
                'menu_id' => 15,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 => 
            array (
                'id' => 38,
                'menu_id' => 15,
                'size' => 'L',
                'price' => '300',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 => 
            array (
                'id' => 39,
                'menu_id' => 16,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 => 
            array (
                'id' => 40,
                'menu_id' => 16,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 => 
            array (
                'id' => 41,
                'menu_id' => 16,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 => 
            array (
                'id' => 42,
                'menu_id' => 18,
                'size' => 'L',
                'price' => '300',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 => 
            array (
                'id' => 43,
                'menu_id' => 18,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 => 
            array (
                'id' => 44,
                'menu_id' => 18,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 => 
            array (
                'id' => 45,
                'menu_id' => 13,
                'size' => 'S',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 => 
            array (
                'id' => 67,
                'menu_id' => 48,
                'size' => 'S',
                'price' => '119',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            28 => 
            array (
                'id' => 68,
                'menu_id' => 48,
                'size' => 'M',
                'price' => '149',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 => 
            array (
                'id' => 69,
                'menu_id' => 48,
                'size' => 'L',
                'price' => '179',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            30 => 
            array (
                'id' => 70,
                'menu_id' => 7,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            31 => 
            array (
                'id' => 71,
                'menu_id' => 7,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            32 => 
            array (
                'id' => 72,
                'menu_id' => 7,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            33 => 
            array (
                'id' => 73,
                'menu_id' => 9,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            34 => 
            array (
                'id' => 74,
                'menu_id' => 9,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            35 => 
            array (
                'id' => 75,
                'menu_id' => 9,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            36 => 
            array (
                'id' => 76,
                'menu_id' => 49,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            37 => 
            array (
                'id' => 77,
                'menu_id' => 49,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            38 => 
            array (
                'id' => 78,
                'menu_id' => 49,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            39 => 
            array (
                'id' => 79,
                'menu_id' => 10,
                'size' => 'S',
                'price' => '119',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            40 => 
            array (
                'id' => 80,
                'menu_id' => 10,
                'size' => 'M',
                'price' => '149',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            41 => 
            array (
                'id' => 81,
                'menu_id' => 10,
                'size' => 'L',
                'price' => '179',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            42 => 
            array (
                'id' => 82,
                'menu_id' => 8,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            43 => 
            array (
                'id' => 83,
                'menu_id' => 8,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            44 => 
            array (
                'id' => 84,
                'menu_id' => 8,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            45 => 
            array (
                'id' => 85,
                'menu_id' => 11,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            46 => 
            array (
                'id' => 86,
                'menu_id' => 11,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            47 => 
            array (
                'id' => 87,
                'menu_id' => 11,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            48 => 
            array (
                'id' => 88,
                'menu_id' => 17,
                'size' => 'S',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            49 => 
            array (
                'id' => 89,
                'menu_id' => 17,
                'size' => 'M',
                'price' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            50 => 
            array (
                'id' => 90,
                'menu_id' => 17,
                'size' => 'L',
                'price' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            51 => 
            array (
                'id' => 94,
                'menu_id' => 54,
                'size' => 'S',
                'price' => '111',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            52 => 
            array (
                'id' => 95,
                'menu_id' => 54,
                'size' => 'M',
                'price' => '123',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            53 => 
            array (
                'id' => 96,
                'menu_id' => 54,
                'size' => 'L',
                'price' => '231',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}