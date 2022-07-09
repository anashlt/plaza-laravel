<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            ['name' => 'Cars and Vehicles', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now(), 'slug' => 'cars_and_vehicles'],
                ['name' => 'Cars', 'parent_id' => 1, 'icon' => '/img/car.svg', 'created_at' => Carbon::now(), 'slug' => 'cars'],
                ['name' => 'Motorcycles', 'parent_id' => 1, 'icon' => '/img/motorcycle.svg', 'created_at' => Carbon::now(), 'slug' => 'motorcycles'],

            ['name' => 'Property and Accommodation', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now(), 'slug' => 'property_and_accommodation'],
                ['name' => 'Property for Sale', 'parent_id' => 5, 'icon' => '/img/house-property.svg', 'created_at' => Carbon::now(), 'slug' => 'property_for_sale'],
                ['name' => 'Property for Rent', 'parent_id' => 5, 'icon' => '/img/rent-property.svg', 'created_at' => Carbon::now(), 'slug' => 'property_for_rent'],
                ['name' => 'Exchange', 'parent_id' => 5, 'icon' => '/img/exchange.svg', 'created_at' => Carbon::now(), 'slug' => 'exchange'],

            ['name' => 'Pets', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now(), 'slug' => 'pets'],
                ['name' => 'Dogs', 'parent_id' => 9, 'icon' => '/img/dog.svg', 'created_at' => Carbon::now(), 'slug' => 'dogs'],
                ['name' => 'Cats', 'parent_id' => 9, 'icon' => '/img/cat.svg', 'created_at' => Carbon::now(), 'slug' => 'cats'],
                ['name' => 'Birds', 'parent_id' => 9, 'icon' => '/img/bird.svg', 'created_at' => Carbon::now(), 'slug' => 'birds'],

            ['name' => 'Clothing and Jewellery', 'parent_id' => '', 'icon' => '/img/no-image.png', 'created_at' => Carbon::now(), 'slug' => 'clothing_and_jewellery'],
                ['name' => 'Women', 'parent_id' => 13, 'icon' => '/img/handbag.svg', 'created_at' => Carbon::now(), 'slug' => 'women'],
                ['name' => 'Men', 'parent_id' => 13, 'icon' => '/img/suit.svg', 'created_at' => Carbon::now(), 'slug' => 'men'],
                ['name' => 'Jewellery', 'parent_id' => 13, 'icon' => '/img/gem.svg', 'created_at' => Carbon::now(), 'slug' => 'jewellery'],

        ]);
    }
}
