<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\City;

class AdminController extends Controller
{
    public function index()
    {
        $adsCount = Post::count();
        $published = Post::where('is_published', 1)->count();
        $pending = Post::where('is_published', 0)->count();
        $users = User::count();

        return view('admin.index', [
            'adsCount' => $adsCount, 
            'published' => $published, 
            'users' => $users, 
            'pending' => $pending, 
        ]);
    }

    public function posts()
    {
        $posts = Post::all();
        return view('admin.posts', [
            'posts' => $posts,
        ]);
    }

    public function editPost(int $postId)
    {
        $post = Post::find($postId);
        $categories = Category::get();
        $cities = City::get();

        return view('admin.editPost', [
            'post' => $post,
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }
}
