<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InventoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Inventory')->delete();
        
        \DB::table('Inventory')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_item' => 2,
                'quantity' => '10',
                'date' => '2026-05-18',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 2,
                'id_item' => 4,
                'quantity' => '2',
                'date' => '2026-05-18',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 3,
                'id_item' => 2,
                'quantity' => '300',
                'date' => '2026-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 4,
                'id_item' => 4,
                'quantity' => '10',
                'date' => '2026-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 5,
                'id_item' => 6,
                'quantity' => '1',
                'date' => '2026-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 6,
                'id_item' => 2,
                'quantity' => '1',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 7,
                'id_item' => 4,
                'quantity' => '1',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 8,
                'id_item' => 6,
                'quantity' => '1',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}