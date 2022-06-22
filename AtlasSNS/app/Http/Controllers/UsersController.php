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
    public function search(Request $request){//bledeから送られてくるものを受け取る記述
      // dd($request);
        $users = User::all();//users変数の中にユーザーテーブルの内容が全部入ってる
        //()は送るブレード先
        // return view('users.search')->with('users', $users);//変数usersをbladeに送る
        $keyword = $request->input('keyword');
        
        if(!empty($keyword)) {
          $query = User::query();
          $query->where('username', 'LIKE', "%{$keyword}%");
          $users = $query->get();
      return view('users.search', compact('users', 'keyword'));
      }
      return view('users.search')->with('users', $users);
      // $users = $query->get();
      // return view('search', compact('users', 'keyword'));
    }

      //フォロー、フォロワー数表示に使う

      public function postCounts(){
        $posts = Post::get();             //$postsをインデックスに持っていくのがcompa
        return view('posts.index', compact('posts'));
      }
}