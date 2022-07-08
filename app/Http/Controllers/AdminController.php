<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

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
        return view('admin.posts');
    }
}
