<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Menu')->delete();
        
        \DB::table('Menu')->insert(array (
            0 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'name' => 'Фильтр',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 4,
                'category_id' => 1,
                'name' => 'Флэт-уайт',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 5,
                'category_id' => 1,
                'name' => 'Капучино',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 6,
                'category_id' => 1,
                'name' => 'Латте',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 7,
                'category_id' => 1,
                'name' => 'Раф',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 8,
                'category_id' => 1,
                'name' => 'Чай черный/зеленый',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 9,
                'category_id' => 1,
                'name' => 'Сибирский чай',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 10,
                'category_id' => 1,
                'name' => 'Цитрусовый',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 => 
            array (
                'id' => 11,
                'category_id' => 1,
                'name' => 'Яблоко Вишня',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 => 
            array (
                'id' => 13,
                'category_id' => 2,
                'name' => 'Лимонад Лимон Лайм',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 => 
            array (
                'id' => 14,
                'category_id' => 2,
                'name' => 'Лимонад Малина',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 => 
            array (
                'id' => 15,
                'category_id' => 2,
                'name' => 'Лимонад Апельсин',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 => 
            array (
                'id' => 16,
                'category_id' => 2,
                'name' => 'Смузи Клубника Смородина',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 => 
            array (
                'id' => 17,
                'category_id' => 2,
                'name' => 'Смузи Клубника Манго',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 => 
            array (
                'id' => 18,
                'category_id' => 2,
                'name' => 'Смузи Апельсин',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 => 
            array (
                'id' => 19,
                'category_id' => 3,
                'name' => 'С Курицей',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 => 
            array (
                'id' => 20,
                'category_id' => 3,
                'name' => 'Сырный',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 => 
            array (
                'id' => 21,
                'category_id' => 3,
                'name' => 'С Ветчиной',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 => 
            array (
                'id' => 22,
                'category_id' => 5,
                'name' => 'Классический',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 => 
            array (
                'id' => 23,
                'category_id' => 5,
                'name' => 'Шоколадный',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 => 
            array (
                'id' => 24,
                'category_id' => 5,
                'name' => 'Лимонный',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 => 
            array (
                'id' => 25,
                'category_id' => 6,
                'name' => 'Клубника',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 => 
            array (
                'id' => 26,
                'category_id' => 6,
                'name' => 'Манго',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 => 
            array (
                'id' => 27,
                'category_id' => 6,
                'name' => 'Голубика',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 => 
            array (
                'id' => 28,
                'category_id' => 6,
                'name' => 'Малина',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 => 
            array (
                'id' => 29,
                'category_id' => 6,
                'name' => 'Персик',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 => 
            array (
                'id' => 30,
                'category_id' => 6,
                'name' => 'Нутелла',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 => 
            array (
                'id' => 31,
                'category_id' => 7,
                'name' => 'Клубничный',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            28 => 
            array (
                'id' => 32,
                'category_id' => 7,
                'name' => 'Шоколадный',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 => 
            array (
                'id' => 33,
                'category_id' => 7,
                'name' => 'Соленая карамель',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            30 => 
            array (
                'id' => 34,
                'category_id' => 7,
                'name' => 'Маршмеллоу',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            31 => 
            array (
                'id' => 35,
                'category_id' => 4,
                'name' => 'Цезарь',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            32 => 
            array (
                'id' => 36,
                'category_id' => 4,
                'name' => 'Винегрет',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            33 => 
            array (
                'id' => 48,
                'category_id' => 1,
                'name' => 'Эспрессо',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            34 => 
            array (
                'id' => 49,
                'category_id' => 1,
                'name' => 'Глинтвейн',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            35 => 
            array (
                'id' => 50,
                'category_id' => 6,
                'name' => 'Серый',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            36 => 
            array (
                'id' => 54,
                'category_id' => 1,
                'name' => 'Американо',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}