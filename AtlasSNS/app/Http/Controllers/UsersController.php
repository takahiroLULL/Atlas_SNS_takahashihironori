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
        return view('users.search');
    }
    
    public function index() {
        $users = User::all();
        return view('index')->with('users', $users);
      }//検索結果を表示させる　
}
