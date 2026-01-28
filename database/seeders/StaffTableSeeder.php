<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Staff')->delete();
        
        \DB::table('Staff')->insert(array (
            0 => 
            array (
                'id' => 1,
                'full_name' => 'Гришко Марина',
            'number' => '+7 (000) 000-00-00',
                'address' => 'г. Краснодар, ул. Автолюбителей, д. 1, кв. 10',
                'bday' => '2005-04-01',
                'color' => '#f97316',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 3,
                'full_name' => 'Почкин Денис',
                'number' => '79009009090',
                'address' => 'г. Краснодар, ул. Ялтинская, д. 1',
                'bday' => '2005-04-22',
                'color' => '#14b8a6',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 4,
                'full_name' => 'Лапшина Ира',
                'number' => '79009009090',
                'address' => 'г. Краснодар, ул. Автолюбителей, д. 1, кв. 10',
                'bday' => '2005-04-22',
                'color' => '#6366f1',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 5,
                'full_name' => 'Черных Полина',
            'number' => '+7 (800) 213-98-48',
                'address' => 'Автолюбителей 1/7 корп 4',
                'bday' => '2002-02-20',
                'color' => '#d57bff',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 6,
                'full_name' => 'Фидько Ксения',
            'number' => '+7 (800) 213-98-48',
                'address' => 'Красноармейская, 240, кв 114',
                'bday' => '2001-05-16',
                'color' => '#ec4899',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}