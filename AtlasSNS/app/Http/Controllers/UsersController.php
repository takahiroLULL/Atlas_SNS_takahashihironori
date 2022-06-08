<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
      $query = User::query();//ユーザーテーブルに命令
      $users = $query->where('name','like', '%' .$keyword_name. '%')->get();
      $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
      return view('/serch')->with([
        'users' => $users,
        'message' => $message,
        return view('users.search');
    }
    
    public function index() {
        $users = User::all();
        return view('index')->with('users', $users);
      }//検索結果を表示させる　
}
