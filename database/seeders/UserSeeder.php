<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperAdmin',
            // 'seel_code' => '777',
            'email' => '777@777.com',
            'password' => Hash::make('123456789'),
            'role_id' => 1,
        ]);
        User::create([
            // Ashraf Mostafa
            'name' => 'Abdelrahman Mohamed',
            // 'seel_code' => '4173',
            'email' => 'Abdelrahman.Mohamed@samaya-electronics.com',
            'password' => Hash::make('123456789'),
            'role_id' => 1,
        ]); 
        User::create([
            // Ashraf Mostafa
            'name' => 'Ashraf Mostafa',
            // 'seel_code' => '4173',
            'email' => 'ashraf.mostafa@samaya-electronics.com',
            'password' => Hash::make('4173'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Mohamed Magdy',
            // 'seel_code' => '7650',
            'email' => '7650',
            'password' => Hash::make('7650'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Yassin Sayed',
            // 'seel_code' => '7330',
            'email' => '7330',
            'password' => Hash::make('7330'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Sayed Fatouh',
            // 'seel_code' => '4176',
            'email' => '4176',
            'password' => Hash::make('4176'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'user',
            // 'seel_code' => '2000',
            'email' => '2000',
            'password' => Hash::make('2002@2'),
            'role_id' => 3,
        ]);
    }
}
