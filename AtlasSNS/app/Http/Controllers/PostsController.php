<?php

namespace App\Http\Controllers;

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


    // public function index(Post $posts){


    //     $posts = Post::where()
    //     ->orderBy('created_at', 'desc')->get();
    //     return view('posts.index',compact('posts'));
    //     }
        

    public function index(Post $post, Follow $follow){

        $user = auth()->user();
        $follow_ids = $follow->followingIds($user->id);
        // followed_idだけ抜き出す
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $timelines = $post->getTimelines($user->id, $following_ids);
        dd($timelines);
        return view('posts.index', [
            'timelines' => $timelines
        ]);

    }

    public function create(Request $request)
    {
        $validator = $request->validate([ // これだけでバリデーションできる
                'post' => ['required', 'string', 'max:150'], 
            ]);
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
