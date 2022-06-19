<?php

namespace App\Http\Controllers;//の中の↓

use Illuminate\Http\Request;
use App\Post; //使うディレクトリの指定ここで宣言しないと使えない
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = User::all();//users変数の中にユーザーテーブルの内容が全部入ってる
        //()は送るブレード先
        return view('users.search')->with('users', $users);//変数usersをbladeに送る
    }

      //フォロー、フォロワー数表示に使う

      public function postCounts(){
        $posts = Post::get();             //$postsをインデックスに持っていくのがcompa
        return view('posts.index', compact('posts'));
      }
}