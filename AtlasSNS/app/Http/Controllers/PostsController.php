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

    public function store(Request $request)
    {
        $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'post' => ['required', 'string', 'max:200'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
    }
    
    public function create(Request $request)
    {
        $post = $request->newPost;
    //    $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
    //         'post' => ['required', 'string', 'max:200'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
    //     ]);
        \DB::table('posts')->insert
        ([
            'user_id' => Auth::user()->id,
            'post' => $post, 

        ]);
        return redirect('/top');
    }
}