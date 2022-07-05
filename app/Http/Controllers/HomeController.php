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
        $ads = Post::where('category_id', $categoryId)
        ->where('is_published', 1)
        ->get();

        return view('ads.by_category', [
            'ads' => $ads
        ]);
    }

    public function showAdByCity($category, $city)
    {
        $categoryId = Category::where('slug', $category)->first()->id;
        $cityId = City::where('slug', $city)->first()->id;
        $ads = Post::where('category_id', $categoryId)
        ->where('is_published', 1)  // get only published ads
        ->where('city_id', $cityId)
        ->get();

        return view('ads.by_city', [
            'ads' => $ads
        ]);
    }
    
    public function search(Request $request)
    {
        // if(empty($request->get('q'))) 
        // {
        //     return redirect()->back();
        // }

        $cityId = City::where('name', $request->get('c'))->first()->id ?? '';

        $ads = Post::when(empty($cityId),function($query) use ($request) {
                $query->where('title', 'LIKE', $request->get('q'). '%');
            } , function($query) use ($request, $cityId){
                    $query->where('title', 'LIKE', $request->get('q'). '%')
                        ->where('city_id', $cityId);
            })->get(); 
            
        return view('ads.search', [
            'ads' => $ads
        ]);
    }

    public function titleAutocomplete(Request $request)
    {
        $data = Post::select("title as value", "id")
        ->where('title', 'LIKE', '%'. $request->get('search'). '%')
        ->where('is_published', 1)
        ->get();

        return response()->json($data);
    }

    public function cityAutocomplete(Request $request)
    {
        $data = City::select("name as value", "id")
        ->where('name', 'LIKE', $request->get('search'). '%')
        ->get();

        return response()->json($data);
    }

    /**
     * Browse all the published ads
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function browse() 
    {
        $ads = Post::where('is_published', 1)  // get only published ads
        ->with('category')
        ->with('city')
        ->get();

        return view('ads.browse', [
            'ads' => $ads,
        ]);
    }
}
