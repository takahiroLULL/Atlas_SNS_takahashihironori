<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // <--- 追加

use App\Post;


class PostsController extends Controller
{
    
    public function index(){

    // $posts = \DB::table('posts')->get();
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('posts.index',compact('posts'));
    }
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([ // これだけでバリデーションできる
            'post' => ['required', 'string', 'max:200'], // 必須・文字であること・200文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
    }
    
    public function create(Request $request)
    {
        $post = $request->newPost;
        Post::create ([
            'user_id' => Auth::user()->id,
            'post' => $post, 
        ]);
        
        return redirect('/top');
    }

    public function update(Request $request )
    {   
       $text = $request->post;
       $post = Post::find($text);
       $post->update(['post'=>$request->text]);

       return redirect('/top');
        
    }
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('/top');
    }
}
