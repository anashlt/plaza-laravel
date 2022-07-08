<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostPicture;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city, $category, $slug)
    {
        $ad = Post::where('slug', $slug)->where('is_published', 1)
        ->with('category')
        ->with('user')
        ->with('pictures')
        ->first();

        return view('ads.single', [
            'ad' => $ad
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create', [
            'cities' => \App\Models\City::where('is_active', 1)->get(),
            'categories' => \App\Models\Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $data)
    {

        $validated = $data->validate([
            'title' => ['required', 'string', 'max:80'],
            'pictures' => ['required', 'array', 'min:1'],
            'city' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:600'],
        ]);

        $path = $data['pictures'][0];

        $id = Post::create([
            'title' => $data['title'],
            'avatar' => $path,
            'city_id' => $data['city'],
            'category_id' => $data['category'],
            'price' => $data['price'],
            'description' => $data['description'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($data['title'], '_'),
        ])->id;

        foreach(array_slice($data['pictures'],1) as $picture) 
        {
            PostPicture::create([
                'path' => $picture,
                'post_id' => $id,
            ]);
        }

        return view('ads.thank-you');
    }

    public function uploadImage(Request $request) 
    {
        $validated = $request->validate([
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
        ]);

        $imageName = time() . "_" . $request->avatar->getClientOriginalName();
        $request->avatar->move(public_path('uploads'), $imageName);

    	return response()->json(['uploaded' => "/uploads/".$imageName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
    }
}
