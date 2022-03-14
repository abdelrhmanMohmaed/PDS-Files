<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            //  RENAULT ICP

            [
                'part_num' => 'S57530',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57529',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57531',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57532',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57538',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57887',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57533',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57691',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57787',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057565',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057566',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057567',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57788',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57786',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057690',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057539',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057652',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S71057576',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057578',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '72057692',
                'car_model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            //  RENAULT ATL
            , [
                'part_num' => '56806',
                'car_model_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '56807',
                'car_model_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '56808',
                'car_model_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // RENAULT SWITHCH BAR
            [
                'part_num' => '10165460',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165615',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165605',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165450',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165212',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165202',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115461',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115431',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115431',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115411',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115401',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115421',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115322',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10164303',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165586',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165470',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10196806',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10196816',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10137230',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115705',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115342',
                'car_model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // EPB CELL 119
            [
                'part_num' => '10108782',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10178782',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '72057486',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057484',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10067094',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10067054',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57487',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57479',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10063015',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10087382',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10088436',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10088132',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10062896',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10062876',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10137980',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10137990',
                'car_model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // HVAC
            [
                'part_num' => '71058504',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '00059396',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71058255',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58253',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58251',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58260',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58258',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58257',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58252',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58259',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58313',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58256',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58262',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58267',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58268',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58371',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58372',
                'car_model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // XFK
            [
                'part_num' => '10069463',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069473',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069483',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10134870',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10202822',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10134741',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10164096',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10177420',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069433',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069443',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069453',
                'car_model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
