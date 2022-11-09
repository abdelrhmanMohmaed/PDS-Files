<?php

namespace Database\Seeders;

use Database\Factories\MachineFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            ModelSeeder::class,
            PartSeeder::class,
            MachineSeeder::class,
        ]);
    }
}
