<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application first landing page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        $categories = Category::where('parent_id', 0)->get(); // get parent categories
        return view('welcome', [
            'categories' => $categories,
        ]);
    }

    /**
     * Browse all the published ads
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function browse() 
    {
        $ads = Post::where('is_published', 1)->get(); // get only published ads
        return view('ads.browse', [
            'ads' => $ads,
        ]);
    }
}
