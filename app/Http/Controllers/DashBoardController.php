<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $users = User::with('posts')
            ->where('role_id','<>', 3)->get();
        return view('admin.home', compact('users'));
    }

}
