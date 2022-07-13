<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // Dummy users
        DB::table('users')->insert([
            ['name' => 'Admin Account', 'email' => 'admin@admin.com', 'password' => Hash::make('admin123'), 'created_at' => Carbon::now(), 'phone' => $faker->phoneNumber, 'is_admin' => '1'],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'phone' => $faker->phoneNumber, 'is_admin' => '0'],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'phone' => $faker->phoneNumber, 'is_admin' => '0'],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'phone' => $faker->phoneNumber, 'is_admin' => '0'],
        ]);
    }
}
