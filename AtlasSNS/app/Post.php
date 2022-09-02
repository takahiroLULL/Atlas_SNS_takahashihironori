<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['post','user_id'];
   // usersテーブルとのリレーション（従テーブル側）モデル経由で入れる場合は必須
public function user() { //1対多の「１」側なので単数系
return $this->belongsTo('App\User');
    }


    
}
//これでusersとのリレーションができた！//