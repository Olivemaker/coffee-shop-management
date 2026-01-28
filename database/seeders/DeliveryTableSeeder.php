<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Delivery')->delete();
        
        \DB::table('Delivery')->insert(array (
            0 => 
            array (
                'id' => 7,
                'id_supplier' => 5,
                'id_item' => 6,
                'quantity' => '10',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 8,
                'id_supplier' => 7,
                'id_item' => 11,
                'quantity' => '400',
                'date' => '2026-05-03',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}