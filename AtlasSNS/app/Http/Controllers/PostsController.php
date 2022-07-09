<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // <--- 追加

use \App\Post;


class PostsController extends Controller
{
    
    public function index(){

    $posts = \DB::table('posts')->get();
    return view('posts.index',conpact($posts));

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function store(Request $request)
    // {
    //     $post = new Post;
    //     $post->name = $request->name;
    //     $post->title = $request->username;
    //     $post->content = $request->content;
    //     $post->save();
    //     return redirect()->route('posts.create');
    //     // return view('posts.index');
    // }
    
    public function create(Request $request)
    {
        $post = $request->newPost;
        \DB::table('posts')->insert([
            'user_id' => Auth::user()->id,
            'post' => $post, 
        ]);
        return redirect('/top');
    }
}