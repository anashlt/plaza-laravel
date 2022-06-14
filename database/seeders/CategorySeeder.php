<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy categories 
        DB::table('categories')->insert([
            ['name' => 'Cars and Vehicles', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Cars', 'parent_id' => 1, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Motorcycles', 'parent_id' => 1, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Parts and Accessories', 'parent_id' => 1, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],

            ['name' => 'Property and Accommodation', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Property for Sale', 'parent_id' => 2, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Property for Rent', 'parent_id' => 2, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Exchange', 'parent_id' => 2, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],

            ['name' => 'Pets', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Dogs', 'parent_id' => 3, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Cats', 'parent_id' => 3, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Birds', 'parent_id' => 3, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],

            ['name' => 'Clothing and Jewellery', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Women', 'parent_id' => 4, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Men', 'parent_id' => 4, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],
                ['name' => 'Jewellery', 'parent_id' => 4, 'icon' => '/img/no-image.png', 'created_at' => Carbon::now()],

        ]);
    }
}
