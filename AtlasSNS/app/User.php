<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts() { //1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
        }
        //これでpostとのリレーションができた//

        public function followers()
        {
            return $this->belongsTomany(
                'App\User',
                'follows',
                'followed_id',
                'following_id'
            );
        }

        public function follows()
        {
            return $this->belongsTomany(
                'App\User',
                'follows',
                'following_id',
                'followed_id'
                
            );
        }

     // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }


        //フォローしているか
        public function isFollowing(Int $user_id)
        {
          // booleanで値の有無（真偽）の確認
          return (boolean) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
    
        }
    
    
        //フォローされているか
        public function isFollowed(Int $user_id)
        {
          return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    
        }

        public function getFollowCount($user_id)
        {
            return $this->follows()->where('following_id', $user_id)->count();
        }
    
        public function getFollowerCount($user_id)
        {
            return $this->followers()->where('followed_id', $user_id)->count();
        }

        public function getAllUsers(Int $user_id)
      {
          return $this->follows()->Where('following_id', $user_id)->get();
      }

    }
