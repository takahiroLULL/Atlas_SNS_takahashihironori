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
        
        $user = Auth::user();
        $id = Auth::id();
        $validator->validate();
        // ブレードから送られてきたデータ（iconimage)を受け取る
        $image = $request->file('iconimage');
        // 名前が変わる前に保存。$imageに格納（シンボリックリンクを（シンボリックリンクを経由する前）

        // 画像があったら、、、、
        if($image !=null){
          // シンボリックリンクを経由する 名前が変わった後が＄image_pass（ここの変数はなんでもいい）
          $image_path = $image->store('public/images');
          \DB::table('users')
        ->where('id',$id)
        ->update([
          'images' => basename($image_path),
        ]);
        } 
        
        
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
                          // ハッシュ化
        $user->password = bcrypt($request->input('password'));
        $user->bio = $request->input('bio');
        $user->image = basename($image);
        \DB::table('users')
        ->where('id',$id)
        ->update([
          'username' => $request->input('username'),
          'mail' => $request->input('mail'),
          'password' => bcrypt($request->input('password')),
          'bio' => $request->input('bio'),
        ]);
      }
        return redirect('/top');
    }

  

     // フォロー
     public function follow(user $user,$id)
     {
      $user = User::find($id); 
         $follower = auth()->user();
         // フォローしているか
         $is_following = $follower->isFollowing($user->id);
         if(!$is_following) {
             // フォローしていなければフォローする
             $follower->follow($user->id);
             return back();
         }
     }

     
 
     // フォロー解除
     public function unfollow(User $user,$id)
     {
      $user = User::find($id);
         $follower = auth()->user();
         // フォローしているか
         $is_following = $follower->isFollowing($user->id);
         if($is_following) {
             // フォローしていればフォローを解除する
             $follower->unfollow($user->id);
             return back();
         }
     }
    }