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

      if($request->ismethod('post')){
        $rulus =[
          'username' =>'required|min:2|max:12',
          'mail' =>'required|email|min:5|max:40|unique:users',
          'password' =>'required|alpha_dash|min:8|max:20|confirmed|string',
          'password_confirmation' =>'required|alpha_dash|min:8|max:20|string',
          'bio' =>'max:150',
          'iconimage' => 'image|mimes:jpg,png,bmp,gif,svg',
        ];
        
        $message = [
          'username.required' => 'ユーザー名を入力してください',
          'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
          'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
          'mail.required' => 'メールアドレスを入力してください',
          'mail.email' => '有効なEメールアドレスを入力してください',
          'mail.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
          'mail.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
          'mail.unique:users' => 'このメールアドレスは既に使われています',
          'password.required' => 'パスワードを入力してください',
          'password.min' => 'パスワードは8文字以上、20文字以下で入力してください',
          'password.max' => 'パスワードは8文字以上、20文字以下で入力してください',
          'password.alpha_dash' => 'パスワードは英数字のみ入力してください',
          'password.confirmed' => '確認パスワードが一致しません',
          'password_confirmation.required' => '確認パスワードを入力してください',
          'password.alpha_num' => 'パスワードは半角数字で入力してください',
          'iconimage.image' => '指定されたファイルは画像ではありません',
          'iconimage.alpha_dash' =>'ファイル名は英数字のみです',
          'iconimage.mimes' => '指定されたファイルではありません'
        ];
        $validator = validator::make($request->all(),$rulus,$message);

        if($validator->fails()){
          return redirect('/profile')
          ->withErrors($validator)
          ->withInput();
        }
        // dd($request);
        $user = Auth::user();
        $id = Auth::id();
        $validator->validate();
 

        if($image =null){
          $image = $request->file('iconimage')->store('public/image');
        }
      

        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = bcrypt($request->input('password'));
        $user->bio = $request->input('bio');
        $user->image = basename($image);
        \DB::table('users')
        ->where('id',$id)
        ->update([
          'username' => $user->username,
          'mail' => $user->mail,
          'password' => $user->password,
          'bio' => $user->bio,
          'images' => $user->image,
        ]);
      }
 
        return redirect('/top');
    }

    public function searchPage(){
      $list = User::where("id" , "!=" , Auth::user()->id)->with('followers')->get();
      
      return view('users.search',['lists'=>$list]);
    }

    //フォローしているか
    public function isFollowing(Int $user_id)
    {
      // booleanで値の有無（真偽）の確認
      return (boolean) $this->follws()->where('following_id', $user_id)->first(['id']);

    }


    //フォローされているか
    public function isFollowed(Int $user_id)
    {
      return (boolean) $this->follwers()->where('following_id', $user_id)->first(['id']);

    }

    









    // public function follow(User $user)
    // {
    //     $follower = auth()->user();
    //     // フォローしているか
    //     $is_following = $follower->isFollowing($user->id);
    //     if(!$is_following) {
    //         // フォローしていなければフォローする
    //         $follower->follow($user->id);
    //         return back();
    //     }
    // }

    // // フォロー解除
    // public function unfollow(User $user)
    // {
    //     $follower = auth()->user();
    //     // フォローしているか
    //     $is_following = $follower->isFollowing($user->id);
    //     if($is_following) {
    //         // フォローしていればフォローを解除する
    //         $follower->unfollow($user->id);
    //         return back();
    //     }
    // }


    
}