<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

    protected $fillable = [
        'following_id', 'followed_id'
      ];
      public function posts() { //1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
        }
        
      public function followingIds(Int $user_id)
      {
          return $this->where('following_id', $user_id)->get('followed_id');
      }
  
    
}
