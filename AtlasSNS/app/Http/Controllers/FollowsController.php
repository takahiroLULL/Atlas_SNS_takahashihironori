<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $images = User::get();
        return view('follows.followList',compact('posts','images'));
    }
    public function followerList(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('follows.followerList',compact('posts'));
    }

    public function index(User $user)
{
    $all_users = $user->getAllUsers(auth()->user()->id);
    return view('follows.followlist', [
        'all_users'  => $all_users
    ]);
}

    
}
