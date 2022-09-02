<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function index(User $user)
{
    $all_users = $user->getAllUsers(auth()->user()->id);
    return view('follows.followlist', [
        'all_users'  => $all_users
    ]);
}

    
}
