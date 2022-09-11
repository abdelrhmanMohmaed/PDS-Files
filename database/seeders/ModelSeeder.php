<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([
            [
                'name' => 'Renault ICP',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Renault ATL',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Renault Switch Bar',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'EPB CELL 119',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'HVAC',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'XFK',
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
