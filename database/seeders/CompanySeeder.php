<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Renault',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Mitsubishi',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Jaguer',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Volvo',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Skoda',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'BusBar',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Malta',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Ford',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Flat',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Aston Martin',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Thun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
