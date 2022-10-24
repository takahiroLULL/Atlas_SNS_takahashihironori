<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    public function followList(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $users = User::get();
        return view('follows.followList',compact('posts','users'));
    }
    
    public function followerList(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $users = User::get();

        return view('follows.followerList',compact('posts','users'));
    }
    
    public function user($id){
        $user_id = User::find($id);
        $posts = Post::where('user_id',$id)->get();
        return view('follows.user',compact('user_id','posts'));
    }

}
