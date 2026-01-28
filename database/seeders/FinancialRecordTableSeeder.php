<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinancialRecordTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('FinancialRecord')->delete();
        
        \DB::table('FinancialRecord')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '23730',
                'payment_method' => 'карта',
                'type' => 'выручка',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 2,
                'amount' => '2340',
                'payment_method' => 'наличные',
                'type' => 'выручка',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '23730',
                'payment_method' => 'карта',
                'type' => 'ЗП',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 4,
                'amount' => '547',
                'payment_method' => 'карта',
                'type' => 'такси',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 5,
                'amount' => '2370',
                'payment_method' => 'наличные',
                'type' => 'выручка',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 6,
                'amount' => '24900',
                'payment_method' => 'карта',
                'type' => 'ЗП',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 7,
                'amount' => '500',
                'payment_method' => 'наличные',
                'type' => 'такси',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 8,
                'amount' => '700',
                'payment_method' => 'карта',
                'type' => 'такси',
                'date' => '2026-05-19',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 => 
            array (
                'id' => 9,
                'amount' => '234567890',
                'payment_method' => 'наличные',
                'type' => 'ЗП',
                'date' => '2026-01-24',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}