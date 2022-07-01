<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Str;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city, $category, $slug)
    {
        $ad = Post::where('slug', $slug)->with('category')->with('user')->first();
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
            'categories' => \App\Models\Category::where('parent_id', '!=', 0)->get(),
        ]);
    }

    /**
     * Get a validator for an incoming post creation request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:80'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
            'city' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'price' => ['numeric'],
            'description' => ['required', 'string', 'max:600'],
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
        $imagePath = $data->file('avatar');
        $imageName = $imagePath->getClientOriginalName();
        $path = $data->file('avatar')->storeAs('uploads', time().'_'.$imageName, 'public');

        Post::create([
            'title' => $data['title'],
            'avatar' => $path,
            'city_id' => $data['city'],
            'category_id' => $data['category'],
            'price' => $data['price'],
            'description' => $data['description'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($data['title'], '_'),
        ]);

        return 'Post created';
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
        //
    }
}
