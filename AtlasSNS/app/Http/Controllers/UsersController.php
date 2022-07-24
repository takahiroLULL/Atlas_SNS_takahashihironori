<?php

namespace App\Http\Controllers;//の中の↓

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Post; //使うディレクトリの指定ここで宣言しないと使えない
use Illuminate\Support\Facades\Auth;
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

      public function profileup(Request $request){
        $validator = Validator::make($request->all(),[
          'username'  => 'required|min:2|max:12',
          'mail' => 'required|min:5|max:40|email|unique:users,mail',
          'password' => 'min:8|max:20|confirmed|alpha_num',
          'password_confirmation' => 'min:8|max:20|alpha_num',
          'bio' => 'max:150',
          'icon image' => 'image｜alpha_num',
        ]);

        $user = Auth::user();
        //画像登録
        $image = $request->file('iconimage')->store('public/images');
        $validator->validate();
        $user->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => bcrypt($request->input('password')),
            'bio' => $request->input('bio'),
            'images' => basename($image),
        ]);
        dd($user);

        return redirect('/profile');
    }
}