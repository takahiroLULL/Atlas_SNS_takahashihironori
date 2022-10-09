<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

use App\User;
use App\Post;
use App\Follow;


class PostsController extends Controller
{

    

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Post $posts){


        $posts = Post::orderBy('created_at', 'desc')
        ->get();
        return view('posts.index',compact('posts'));
        }
        
    public function create(Request $request)
    {
        // $validator = $request->validate([ // これだけでバリデーションできる
        //         'post' => ['required', 'min1', 'max:150'], 
        //     ]);
        
        // if ($validator->fails()) {
        //     return redirect('/top')
        //     ->withErrors($validator)
        //     ->withInput();
        //     }
        
        $validator = $request->validate([
            'newPost' => ['required', 'min:1', 'max:200'], 
        ]);
     
            $post = $request->newPost;
            Post::create ([
                'user_id' => Auth::user()->id,
                'post' => $post, 
            ]);
        return redirect('/top');

       

    }

    public function store(Request $request)
    {
        //追記
        $validator = Validator::make($request->all(), [
            'post' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function update(Request $request )
    {   
       $text = $request->post;
        // find＝探す
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
