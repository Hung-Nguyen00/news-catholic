<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $users = User::with('posts')
            ->where('role_id','<>', 3)->get();
        $count_post = Post::count();
        $count_view = Post::sum('views');
        $count_user = User::count();
        $count_advertise = Advertise::count();
        return view('admin.home', compact('users',
            'count_post',
            'count_view',
            'count_user',
            'count_advertise'));
    }

}
