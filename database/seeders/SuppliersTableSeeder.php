<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Suppliers')->delete();
        
        \DB::table('Suppliers')->insert(array (
            0 => 
            array (
                'id' => 5,
                'company' => 'ООО Ванилька',
                'contact_name' => 'Бочкарева Елена Ивановна',
            'number' => '+7 (111) 111-11-11',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 6,
                'company' => 'ООО Все Везем',
                'contact_name' => 'Челкова Валентина Сергеевна',
            'number' => '+7 (900) 900-90-00',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 7,
                'company' => 'ООО Едок',
                'contact_name' => 'Пешкин Максим Владимирович',
            'number' => '+7 (347) 834-63-53',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}