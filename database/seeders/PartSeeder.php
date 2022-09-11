<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
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
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57529',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57531',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57532',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57538',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57887',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57533',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57691',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S57787',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057565',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057566',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057567',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57788',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57786',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057690',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057539',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057652',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => 'S71057576',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057578',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '72057692',
                'model_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            //  RENAULT ATL
            , [
                'part_num' => '56806',
                'model_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '56807',
                'model_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '56808',
                'model_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // RENAULT SWITHCH BAR
            [
                'part_num' => '10165460',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165615',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165605',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165450',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165212',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165202',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115461',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115431',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115431',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115411',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115401',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115421',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115322',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10164303',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165586',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10165470',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10196806',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10196816',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10137230',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115705',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10115342',
                'model_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // EPB CELL 119
            [
                'part_num' => '10108782',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10178782',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '72057486',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71057484',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10067094',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10067054',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57487',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '57479',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10063015',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10087382',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10088436',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10088132',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10062896',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10062876',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10137980',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10137990',
                'model_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // HVAC
            [
                'part_num' => '71058504',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '00059396',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '71058255',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58253',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58251',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58260',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58258',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58257',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58252',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58259',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58313',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58256',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58262',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58267',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58268',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58371',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '58372',
                'model_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // XFK
            [
                'part_num' => '10069463',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069473',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069483',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10134870',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10202822',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10134741',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10164096',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10177420',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069433',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069443',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'part_num' => '10069453',
                'model_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
