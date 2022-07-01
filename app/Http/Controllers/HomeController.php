<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\City;

class HomeController extends Controller
{
    /**
     * Show the application first landing page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        $categories = Category::where('parent_id', '!=', 0)->get(); // get parent categories
        return view('welcome', [
            'categories' => $categories,
        ]);
    }

    public function showAdByCategory($category)
    {
        $categoryId = Category::where('slug', $category)->first()->id;
        $ads = Post::where('category_id', $categoryId)->get();
        return view('ads.by_category', [
            'ads' => $ads
        ]);
    }

    public function showAdByCity($category, $city)
    {
        $categoryId = Category::where('slug', $category)->first()->id;
        $cityId = City::where('slug', $city)->first()->id;
        $ads = Post::where('category_id', $categoryId)->where('city_id', $cityId)->get();

        return view('ads.by_city', [
            'ads' => $ads
        ]);
    }

    /**
     * Browse all the published ads
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function browse() 
    {
        $ads = Post::where('is_published', 1)->with('category')->with('getCity')->get(); // get only published ads
        return view('ads.browse', [
            'ads' => $ads,
        ]);
    }
}
