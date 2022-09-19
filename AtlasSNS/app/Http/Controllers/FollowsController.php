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

    public function user(Request $request){
        dd($request);
        $users = User::all();
        $id = $request->input('id');

          $query = User::query();
          $query->where('id',$id);
          $users = $query->get();
        return view('follows.user',compact('users','id'));
    }



    public function followerList(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $images = User::get();
        return view('follows.followerList',compact('posts','images'));
    }
    
}
