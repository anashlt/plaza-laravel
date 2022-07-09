<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy users
        DB::table('users')->insert([
            ['name' => Str::random(10), 'email' => Str::random(10).'@gmail.com', 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'phone' => rand(100000000,999999999)],
            ['name' => Str::random(10), 'email' => Str::random(10).'@gmail.com', 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'phone' => rand(100000000,999999999) ],
        ]);
    }
}
