<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Store')->delete();
        
        \DB::table('Store')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Стаканы',
                'current_quantity' => '1',
                'unit_measure' => 'шт',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Молоко',
                'current_quantity' => '1',
                'unit_measure' => 'шт',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Кофе',
                'current_quantity' => '2',
                'unit_measure' => 'кг',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Крышки',
                'current_quantity' => '570',
                'unit_measure' => 'шт',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Сахар',
                'current_quantity' => '1',
                'unit_measure' => 'кг',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Чай зеленый рассыпной',
                'current_quantity' => '3',
                'unit_measure' => 'кг',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'Трубочки',
                'current_quantity' => '1100',
                'unit_measure' => 'шт',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 16,
                'name' => 'Мука',
                'current_quantity' => '100',
                'unit_measure' => 'кг',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}