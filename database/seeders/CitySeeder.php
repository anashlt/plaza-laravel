<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy cities
        DB::table('cities')->insert([
            ['name' => 'London', 'created_at' => Carbon::now(), 'slug' => 'london'],
            ['name' => 'Manchester', 'created_at' => Carbon::now(), 'slug' => 'manchester'],
            ['name' => 'Leeds', 'created_at' => Carbon::now()], 'slug' => 'leeds',
            ['name' => 'Edinburgh', 'created_at' => Carbon::now(), 'slug' => 'edinburgh'],
            ['name' => 'Glasgow', 'created_at' => Carbon::now(), 'slug' => 'glasgow'],
            ['name' => 'Belfast', 'created_at' => Carbon::now(), 'slug' => 'belfast'],
            ['name' => 'Bristol', 'created_at' => Carbon::now(), 'slug' => 'bristol'],
            ['name' => 'Liverpool', 'created_at' => Carbon::now(), 'slug' => 'liverpool'],
            ['name' => 'York', 'created_at' => Carbon::now(), 'slug' => 'york'],
            ['name' => 'Newcastle', 'created_at' => Carbon::now(), 'slug' => 'newcastle'],
            ['name' => 'Birmingham', 'created_at' => Carbon::now(), 'slug' => 'birmingham'],
            ['name' => 'Brighton', 'created_at' => Carbon::now(), 'slug' => 'brighton'],
            ['name' => 'Cardiff', 'created_at' => Carbon::now(), 'slug' => 'cardiff'],
            ['name' => 'Cambridge', 'created_at' => Carbon::now(), 'slug' => 'cambridge'],
            ['name' => 'Oxford', 'created_at' => Carbon::now(), 'slug' => 'oxford'],
            ['name' => 'Bath', 'created_at' => Carbon::now(), 'slug' => 'bath'],
        ]);
    }
}
