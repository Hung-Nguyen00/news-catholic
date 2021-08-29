<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top_hot_posts = Post::with('category')->limit(3)->get();
        $child_categories = Category::where('parent_id', '<>', 0)->get();
        $latest_one_post = Post::orderBy('created_at', 'DESC')->where('is_video', 0)->first();
        $latest_post = Post::with('category')
            ->orderBy('created_at', 'DESC')
            ->where('is_video', 0)
            ->skip(1)
            ->take(3)
            ->get();
        $video_posts = Post::where('is_video', 1)->orderBy('updated_at', 'DESC')->get();

        return  view('home', compact(
            'top_hot_posts',
                'child_categories',
                    'latest_post',
                    'video_posts',
                    'latest_one_post'));
    }
}
