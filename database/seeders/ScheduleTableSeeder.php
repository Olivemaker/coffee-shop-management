<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Schedule')->delete();
        
        \DB::table('Schedule')->insert(array (
            0 => 
            array (
                'id' => 799,
                'id_staff' => 1,
                'date' => '2026-01-01',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 800,
                'id_staff' => 1,
                'date' => '2026-01-02',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 => 
            array (
                'id' => 801,
                'id_staff' => 1,
                'date' => '2026-01-05',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 => 
            array (
                'id' => 802,
                'id_staff' => 1,
                'date' => '2026-01-06',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 => 
            array (
                'id' => 803,
                'id_staff' => 1,
                'date' => '2026-01-09',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 => 
            array (
                'id' => 804,
                'id_staff' => 1,
                'date' => '2026-01-10',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 => 
            array (
                'id' => 805,
                'id_staff' => 1,
                'date' => '2026-01-13',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 => 
            array (
                'id' => 806,
                'id_staff' => 1,
                'date' => '2026-01-14',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 => 
            array (
                'id' => 807,
                'id_staff' => 1,
                'date' => '2026-01-17',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 => 
            array (
                'id' => 808,
                'id_staff' => 1,
                'date' => '2026-01-18',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 => 
            array (
                'id' => 809,
                'id_staff' => 1,
                'date' => '2026-01-21',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 => 
            array (
                'id' => 810,
                'id_staff' => 1,
                'date' => '2026-01-22',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 => 
            array (
                'id' => 811,
                'id_staff' => 1,
                'date' => '2026-01-25',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 => 
            array (
                'id' => 812,
                'id_staff' => 1,
                'date' => '2026-01-26',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 => 
            array (
                'id' => 813,
                'id_staff' => 1,
                'date' => '2026-01-29',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 => 
            array (
                'id' => 814,
                'id_staff' => 1,
                'date' => '2026-01-30',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 => 
            array (
                'id' => 830,
                'id_staff' => 3,
                'date' => '2026-01-03',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 => 
            array (
                'id' => 831,
                'id_staff' => 3,
                'date' => '2026-01-04',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 => 
            array (
                'id' => 832,
                'id_staff' => 3,
                'date' => '2026-01-07',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 => 
            array (
                'id' => 833,
                'id_staff' => 3,
                'date' => '2026-01-08',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 => 
            array (
                'id' => 834,
                'id_staff' => 3,
                'date' => '2026-01-11',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 => 
            array (
                'id' => 835,
                'id_staff' => 3,
                'date' => '2026-01-12',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 => 
            array (
                'id' => 836,
                'id_staff' => 3,
                'date' => '2026-01-15',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 => 
            array (
                'id' => 837,
                'id_staff' => 3,
                'date' => '2026-01-16',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 => 
            array (
                'id' => 838,
                'id_staff' => 3,
                'date' => '2026-01-19',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 => 
            array (
                'id' => 839,
                'id_staff' => 3,
                'date' => '2026-01-20',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 => 
            array (
                'id' => 840,
                'id_staff' => 3,
                'date' => '2026-01-23',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 => 
            array (
                'id' => 841,
                'id_staff' => 3,
                'date' => '2026-01-24',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            28 => 
            array (
                'id' => 842,
                'id_staff' => 3,
                'date' => '2026-01-27',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 => 
            array (
                'id' => 843,
                'id_staff' => 3,
                'date' => '2026-01-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            30 => 
            array (
                'id' => 844,
                'id_staff' => 3,
                'date' => '2026-01-31',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            31 => 
            array (
                'id' => 860,
                'id_staff' => 4,
                'date' => '2026-01-01',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            32 => 
            array (
                'id' => 861,
                'id_staff' => 4,
                'date' => '2026-01-02',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            33 => 
            array (
                'id' => 862,
                'id_staff' => 4,
                'date' => '2026-01-05',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            34 => 
            array (
                'id' => 863,
                'id_staff' => 4,
                'date' => '2026-01-06',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            35 => 
            array (
                'id' => 864,
                'id_staff' => 4,
                'date' => '2026-01-07',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            36 => 
            array (
                'id' => 865,
                'id_staff' => 4,
                'date' => '2026-01-08',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            37 => 
            array (
                'id' => 866,
                'id_staff' => 4,
                'date' => '2026-01-11',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            38 => 
            array (
                'id' => 867,
                'id_staff' => 4,
                'date' => '2026-01-12',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            39 => 
            array (
                'id' => 868,
                'id_staff' => 4,
                'date' => '2026-01-13',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            40 => 
            array (
                'id' => 869,
                'id_staff' => 4,
                'date' => '2026-01-14',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            41 => 
            array (
                'id' => 870,
                'id_staff' => 4,
                'date' => '2026-01-17',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            42 => 
            array (
                'id' => 871,
                'id_staff' => 4,
                'date' => '2026-01-18',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            43 => 
            array (
                'id' => 872,
                'id_staff' => 4,
                'date' => '2026-01-19',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            44 => 
            array (
                'id' => 873,
                'id_staff' => 4,
                'date' => '2026-01-20',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            45 => 
            array (
                'id' => 874,
                'id_staff' => 4,
                'date' => '2026-01-21',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            46 => 
            array (
                'id' => 875,
                'id_staff' => 4,
                'date' => '2026-01-24',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            47 => 
            array (
                'id' => 876,
                'id_staff' => 4,
                'date' => '2026-01-25',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            48 => 
            array (
                'id' => 877,
                'id_staff' => 4,
                'date' => '2026-01-26',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            49 => 
            array (
                'id' => 878,
                'id_staff' => 4,
                'date' => '2026-01-27',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            50 => 
            array (
                'id' => 879,
                'id_staff' => 4,
                'date' => '2026-01-28',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            51 => 
            array (
                'id' => 880,
                'id_staff' => 4,
                'date' => '2026-01-31',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            52 => 
            array (
                'id' => 897,
                'id_staff' => 5,
                'date' => '2026-01-01',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            53 => 
            array (
                'id' => 898,
                'id_staff' => 5,
                'date' => '2026-01-02',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            54 => 
            array (
                'id' => 899,
                'id_staff' => 5,
                'date' => '2026-01-05',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            55 => 
            array (
                'id' => 900,
                'id_staff' => 5,
                'date' => '2026-01-06',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            56 => 
            array (
                'id' => 901,
                'id_staff' => 5,
                'date' => '2026-01-07',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            57 => 
            array (
                'id' => 902,
                'id_staff' => 5,
                'date' => '2026-01-08',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            58 => 
            array (
                'id' => 903,
                'id_staff' => 5,
                'date' => '2026-01-11',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            59 => 
            array (
                'id' => 904,
                'id_staff' => 5,
                'date' => '2026-01-12',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            60 => 
            array (
                'id' => 905,
                'id_staff' => 5,
                'date' => '2026-01-13',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            61 => 
            array (
                'id' => 906,
                'id_staff' => 5,
                'date' => '2026-01-14',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            62 => 
            array (
                'id' => 907,
                'id_staff' => 5,
                'date' => '2026-01-17',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            63 => 
            array (
                'id' => 908,
                'id_staff' => 5,
                'date' => '2026-01-18',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            64 => 
            array (
                'id' => 909,
                'id_staff' => 5,
                'date' => '2026-01-19',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            65 => 
            array (
                'id' => 910,
                'id_staff' => 5,
                'date' => '2026-01-20',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            66 => 
            array (
                'id' => 911,
                'id_staff' => 5,
                'date' => '2026-01-21',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            67 => 
            array (
                'id' => 912,
                'id_staff' => 5,
                'date' => '2026-01-24',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            68 => 
            array (
                'id' => 913,
                'id_staff' => 5,
                'date' => '2026-01-25',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            69 => 
            array (
                'id' => 914,
                'id_staff' => 5,
                'date' => '2026-01-26',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            70 => 
            array (
                'id' => 915,
                'id_staff' => 5,
                'date' => '2026-01-27',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            71 => 
            array (
                'id' => 916,
                'id_staff' => 5,
                'date' => '2026-01-28',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            72 => 
            array (
                'id' => 917,
                'id_staff' => 5,
                'date' => '2026-01-31',
                'shift' => 'second-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            73 => 
            array (
                'id' => 918,
                'id_staff' => 6,
                'date' => '2026-01-03',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            74 => 
            array (
                'id' => 919,
                'id_staff' => 6,
                'date' => '2026-01-04',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            75 => 
            array (
                'id' => 920,
                'id_staff' => 6,
                'date' => '2026-01-09',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            76 => 
            array (
                'id' => 921,
                'id_staff' => 6,
                'date' => '2026-01-10',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            77 => 
            array (
                'id' => 922,
                'id_staff' => 6,
                'date' => '2026-01-13',
                'shift' => 'first-half',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            78 => 
            array (
                'id' => 923,
                'id_staff' => 6,
                'date' => '2026-01-15',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            79 => 
            array (
                'id' => 924,
                'id_staff' => 6,
                'date' => '2026-01-16',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            80 => 
            array (
                'id' => 925,
                'id_staff' => 6,
                'date' => '2026-01-22',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            81 => 
            array (
                'id' => 926,
                'id_staff' => 6,
                'date' => '2026-01-23',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            82 => 
            array (
                'id' => 927,
                'id_staff' => 6,
                'date' => '2026-01-29',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            83 => 
            array (
                'id' => 928,
                'id_staff' => 6,
                'date' => '2026-01-30',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            84 => 
            array (
                'id' => 929,
                'id_staff' => 1,
                'date' => '2026-02-02',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            85 => 
            array (
                'id' => 930,
                'id_staff' => 1,
                'date' => '2026-02-03',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            86 => 
            array (
                'id' => 931,
                'id_staff' => 1,
                'date' => '2026-02-06',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            87 => 
            array (
                'id' => 932,
                'id_staff' => 1,
                'date' => '2026-02-07',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            88 => 
            array (
                'id' => 933,
                'id_staff' => 1,
                'date' => '2026-02-10',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            89 => 
            array (
                'id' => 934,
                'id_staff' => 1,
                'date' => '2026-02-11',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            90 => 
            array (
                'id' => 935,
                'id_staff' => 1,
                'date' => '2026-02-14',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            91 => 
            array (
                'id' => 936,
                'id_staff' => 1,
                'date' => '2026-02-15',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            92 => 
            array (
                'id' => 937,
                'id_staff' => 1,
                'date' => '2026-02-18',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            93 => 
            array (
                'id' => 938,
                'id_staff' => 1,
                'date' => '2026-02-19',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            94 => 
            array (
                'id' => 939,
                'id_staff' => 1,
                'date' => '2026-02-22',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            95 => 
            array (
                'id' => 940,
                'id_staff' => 1,
                'date' => '2026-02-23',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            96 => 
            array (
                'id' => 941,
                'id_staff' => 1,
                'date' => '2026-02-26',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            97 => 
            array (
                'id' => 942,
                'id_staff' => 1,
                'date' => '2026-02-27',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            98 => 
            array (
                'id' => 943,
                'id_staff' => 1,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            99 => 
            array (
                'id' => 944,
                'id_staff' => 3,
                'date' => '2026-02-01',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            100 => 
            array (
                'id' => 945,
                'id_staff' => 3,
                'date' => '2026-02-04',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            101 => 
            array (
                'id' => 946,
                'id_staff' => 3,
                'date' => '2026-02-05',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            102 => 
            array (
                'id' => 947,
                'id_staff' => 3,
                'date' => '2026-02-08',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            103 => 
            array (
                'id' => 948,
                'id_staff' => 3,
                'date' => '2026-02-09',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            104 => 
            array (
                'id' => 949,
                'id_staff' => 3,
                'date' => '2026-02-12',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            105 => 
            array (
                'id' => 950,
                'id_staff' => 3,
                'date' => '2026-02-13',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            106 => 
            array (
                'id' => 951,
                'id_staff' => 3,
                'date' => '2026-02-16',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            107 => 
            array (
                'id' => 952,
                'id_staff' => 3,
                'date' => '2026-02-17',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            108 => 
            array (
                'id' => 953,
                'id_staff' => 3,
                'date' => '2026-02-20',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            109 => 
            array (
                'id' => 954,
                'id_staff' => 3,
                'date' => '2026-02-21',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            110 => 
            array (
                'id' => 955,
                'id_staff' => 3,
                'date' => '2026-02-24',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            111 => 
            array (
                'id' => 956,
                'id_staff' => 3,
                'date' => '2026-02-25',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            112 => 
            array (
                'id' => 957,
                'id_staff' => 3,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            113 => 
            array (
                'id' => 958,
                'id_staff' => 3,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            114 => 
            array (
                'id' => 959,
                'id_staff' => 4,
                'date' => '2026-02-01',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            115 => 
            array (
                'id' => 960,
                'id_staff' => 4,
                'date' => '2026-02-02',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            116 => 
            array (
                'id' => 961,
                'id_staff' => 4,
                'date' => '2026-02-05',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            117 => 
            array (
                'id' => 962,
                'id_staff' => 4,
                'date' => '2026-02-06',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            118 => 
            array (
                'id' => 963,
                'id_staff' => 4,
                'date' => '2026-02-09',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            119 => 
            array (
                'id' => 964,
                'id_staff' => 4,
                'date' => '2026-02-10',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            120 => 
            array (
                'id' => 965,
                'id_staff' => 4,
                'date' => '2026-02-13',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            121 => 
            array (
                'id' => 966,
                'id_staff' => 4,
                'date' => '2026-02-14',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            122 => 
            array (
                'id' => 967,
                'id_staff' => 4,
                'date' => '2026-02-17',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            123 => 
            array (
                'id' => 968,
                'id_staff' => 4,
                'date' => '2026-02-18',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            124 => 
            array (
                'id' => 969,
                'id_staff' => 4,
                'date' => '2026-02-21',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            125 => 
            array (
                'id' => 970,
                'id_staff' => 4,
                'date' => '2026-02-22',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            126 => 
            array (
                'id' => 971,
                'id_staff' => 4,
                'date' => '2026-02-25',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            127 => 
            array (
                'id' => 972,
                'id_staff' => 4,
                'date' => '2026-02-26',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            128 => 
            array (
                'id' => 973,
                'id_staff' => 4,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            129 => 
            array (
                'id' => 974,
                'id_staff' => 4,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            130 => 
            array (
                'id' => 975,
                'id_staff' => 5,
                'date' => '2026-02-02',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            131 => 
            array (
                'id' => 976,
                'id_staff' => 5,
                'date' => '2026-02-03',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            132 => 
            array (
                'id' => 977,
                'id_staff' => 5,
                'date' => '2026-02-06',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            133 => 
            array (
                'id' => 978,
                'id_staff' => 5,
                'date' => '2026-02-07',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            134 => 
            array (
                'id' => 979,
                'id_staff' => 5,
                'date' => '2026-02-10',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            135 => 
            array (
                'id' => 980,
                'id_staff' => 5,
                'date' => '2026-02-11',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            136 => 
            array (
                'id' => 981,
                'id_staff' => 5,
                'date' => '2026-02-14',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            137 => 
            array (
                'id' => 982,
                'id_staff' => 5,
                'date' => '2026-02-15',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            138 => 
            array (
                'id' => 983,
                'id_staff' => 5,
                'date' => '2026-02-18',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            139 => 
            array (
                'id' => 984,
                'id_staff' => 5,
                'date' => '2026-02-19',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            140 => 
            array (
                'id' => 985,
                'id_staff' => 5,
                'date' => '2026-02-22',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            141 => 
            array (
                'id' => 986,
                'id_staff' => 5,
                'date' => '2026-02-23',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            142 => 
            array (
                'id' => 987,
                'id_staff' => 5,
                'date' => '2026-02-26',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            143 => 
            array (
                'id' => 988,
                'id_staff' => 5,
                'date' => '2026-02-27',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            144 => 
            array (
                'id' => 989,
                'id_staff' => 5,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            145 => 
            array (
                'id' => 990,
                'id_staff' => 6,
                'date' => '2026-02-03',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            146 => 
            array (
                'id' => 991,
                'id_staff' => 6,
                'date' => '2026-02-04',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            147 => 
            array (
                'id' => 992,
                'id_staff' => 6,
                'date' => '2026-02-07',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            148 => 
            array (
                'id' => 993,
                'id_staff' => 6,
                'date' => '2026-02-08',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            149 => 
            array (
                'id' => 994,
                'id_staff' => 6,
                'date' => '2026-02-11',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            150 => 
            array (
                'id' => 995,
                'id_staff' => 6,
                'date' => '2026-02-12',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            151 => 
            array (
                'id' => 996,
                'id_staff' => 6,
                'date' => '2026-02-15',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            152 => 
            array (
                'id' => 997,
                'id_staff' => 6,
                'date' => '2026-02-16',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            153 => 
            array (
                'id' => 998,
                'id_staff' => 6,
                'date' => '2026-02-19',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            154 => 
            array (
                'id' => 999,
                'id_staff' => 6,
                'date' => '2026-02-20',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            155 => 
            array (
                'id' => 1000,
                'id_staff' => 6,
                'date' => '2026-02-23',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            156 => 
            array (
                'id' => 1001,
                'id_staff' => 6,
                'date' => '2026-02-24',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            157 => 
            array (
                'id' => 1002,
                'id_staff' => 6,
                'date' => '2026-02-27',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            158 => 
            array (
                'id' => 1003,
                'id_staff' => 6,
                'date' => '2026-02-28',
                'shift' => 'full-day',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
        
    }
}