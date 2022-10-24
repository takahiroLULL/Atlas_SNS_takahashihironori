@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/create','method'=>'Post']) !!}
<div>
<img src="{{  asset('/storage/images/' . Auth::user()->images) }}">
            <input class="post-input" name="newPost" placeholder="投稿内容を入力してください"><button type="submit"><img src="images/post.png"></button></input>
      
        
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
</div>
{!! Form::close() !!}

@foreach($posts as $post)
@if($post->user_id == Auth::id() || Auth::user()->isFollowing($post->user_id))

<p>

 <hr> 
 <div class="show-post">
   <!-- 変数  モデル カラム -->
 <img src="{{  asset('/storage/images/' . $post->user->images) }}">

<p><td class="username">{{ $post->user->username }}</td></p><!--リレーションしたやつはテーブル名も書く必要がある-->
<p><td class="post">{{ $post->post }}</td></p>
<div class="current_timestamp">
                <p><td>{{ $post->created_at }}</td></p>
                </div>
                
                @if($post->user_id == Auth::id())
                <div class="content">
                <td><a class="js-modal-open" href="{{$post->id}}" post="{{$post->post}}" post_id="{{$post->id}}"><img src="images/edit.png" ></a></td>
                <td><a  href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"></a></td>
</div>
</p>
@endif
</hr>
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{route('posts.update',$post->id)}}" method="POST"><!--このルートで書く場合はweb.phpにnameを記入してあげる-->
               {{csrf_field()}}
                <textarea name="text" class="modal_post" ></textarea>
                <input type="hidden" name="post" class="modal_id" value="PUT">
                <input type="submit" value="更新" >
           </form>
           <a class="js-modal-close"><input type="submit" value="閉じる" ></a>
        </div>
    </div>
</div>
    @endif
    @endforeach

@endsection