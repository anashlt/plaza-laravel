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
            ['name' => 'London', 'created_at' => Carbon::now()],
            ['name' => 'Manchester', 'created_at' => Carbon::now()],
            ['name' => 'Leeds', 'created_at' => Carbon::now()],
            ['name' => 'Edinburgh', 'created_at' => Carbon::now()],
            ['name' => 'Glasgow', 'created_at' => Carbon::now()],
            ['name' => 'Belfast', 'created_at' => Carbon::now()],
            ['name' => 'Bristol', 'created_at' => Carbon::now()],
            ['name' => 'Liverpool', 'created_at' => Carbon::now()],
            ['name' => 'York', 'created_at' => Carbon::now()],
            ['name' => 'Newcastle', 'created_at' => Carbon::now()],
            ['name' => 'Birmingham', 'created_at' => Carbon::now()],
            ['name' => 'Brighton', 'created_at' => Carbon::now()],
            ['name' => 'Cardiff', 'created_at' => Carbon::now()],
            ['name' => 'Cambridge', 'created_at' => Carbon::now()],
            ['name' => 'Oxford', 'created_at' => Carbon::now()],
            ['name' => 'Bath', 'created_at' => Carbon::now()],
        ]);
    }
}
