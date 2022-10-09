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

    public function tweetStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->text = $data['text'];
        $this->save();

        return;
    }

    
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC');
    }
    

}
//これでusersとのリレーションができた！//