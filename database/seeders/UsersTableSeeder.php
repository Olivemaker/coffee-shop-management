<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Users')->delete();
        
        \DB::table('Users')->insert(array (
            0 => 
            array (
                'login' => 'admin',
                'password' => Hash::make('password'),
                'name' => 'Василий',
                'email' => 'olive_05@mail.ru',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}