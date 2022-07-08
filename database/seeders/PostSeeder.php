<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy posts 
        DB::table('posts')->insert([
            ['title' => 'Audi A3', 'description' => 'Audi A3 Description', 'price' => 6500, 'is_published' => 1, 'user_id' => '1', 'category_id' => '2', 'created_at' => Carbon::now(), 'avatar' => '/img/demo_ad_1.jpg', 'slug' => 'audi_a3', 'city_id' => 1],
            ['title' => 'Studio for Rent', 'description' => 'Studio for Rent', 'price' => 1500, 'is_published' => 1, 'user_id' => '1', 'category_id' => '7', 'created_at' => Carbon::now(), 'avatar' => '/img/demo_ad_2.jpg', 'slug' => 'studio_for_rent', 'city_id' => 1],
            ['title' => 'Honda CBR 1000', 'description' => 'Honda CBR 1000', 'price' => 4500, 'is_published' => 1, 'user_id' => '2', 'category_id' => '3', 'created_at' => Carbon::now(), 'avatar' => '/img/demo_ad_3.jpg', 'slug' => 'honda_cbr_1000', 'city_id' => 2],
            ['title' => 'Two bedroom flat with parking', 'description' => 'Two bedroom flat with parking', 'price' => 380000, 'is_published' => 1, 'user_id' => '2', 'category_id' => '6', 'avatar' => '/img/demo_ad_4.jpg', 'created_at' => Carbon::now(), 'slug' => 'two_bedroom_flat_with_parking', 'city_id' => 2],
            ['title' => 'French bulldog puppies', 'description' => 'French bulldog puppies', 'price' => 1000, 'is_published' => 1, 'user_id' => '2', 'category_id' => '10', 'created_at' => Carbon::now(), 'avatar' => '/img/demo_ad_5.jpg', 'slug' => 'french_bulldog_puppies', 'city_id' => 3],
            ['title' => 'Kittens', 'description' => 'Kittens', 'price' => 150, 'is_published' => 1, 'user_id' => '1', 'category_id' => '11', 'created_at' => Carbon::now(), 'avatar' => '/img/demo_ad_6.jpg', 'slug' => 'kittens', 'city_id' => 3],
            ['title' => 'Knitwear', 'description' => 'Knitwear', 'price' => 18, 'is_published' => 1, 'user_id' => '2', 'category_id' => '14', 'created_at' => Carbon::now(), 'avatar' => '/img/demo_ad_7.jpg', 'slug' => 'knitwear', 'city_id' => 3],
        ]);
    }
}
