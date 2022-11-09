@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/create','method'=>'Post']) !!}
<div class="index-form">

<img src="{{  asset('/storage/images/' . Auth::user()->images) }}" width="65px" hight="65px">

            <input class="post-input" name="newPost" placeholder="投稿内容を入力してください"><button type="submit"><img src="images/post.png" class="user-icon"></button></input>
      
        
        @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
</div>

{!! Form::close() !!}

@foreach($posts as $post)
@if($post->user_id == Auth::id() || Auth::user()->isFollowing($post->user_id))
<p>
   <!-- 変数  モデル カラム -->
<div class="user-show">

<div class="user-icon">
<img src="{{  asset('/storage/images/' . $post->user->images) }}" width="65px" height="65px">
</div>

<div class="user-post">
<div class="user-name">
<p>{{ $post->user->username }}<div class="user-created_at">{{ $post->created_at }}</div></p>
</div>
<div class="post-max">
<p>{{ $post->post }}</p>
</div>
</div>       


                
                @if($post->user_id == Auth::id())
                <div class="content">
                <td><a class="js-modal-open" href="{{$post->id}}" post="{{$post->post}}" post_id="{{$post->id}}"><img src="images/edit.png" width="45px" height="45px"></a></td>
                <td><a  href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" width ="50px" height="50px"></a></td>
</div>


</p>
@endif

<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{route('posts.update',$post->id)}}" method="POST"><!--このルートで書く場合はweb.phpにnameを記入してあげる-->
               {{csrf_field()}}
                <textarea name="text" class="modal_post" ></textarea>
                <input type="hidden" name="post" class="modal_id" value="PUT">
               <input type="image"  src="images/edit.png">
           </form>
           <a class="js-modal-close"><input type="submit" value="閉じる" class="btn btn-danger"></a>
        </div>
    </div>
</div>
<hr>
    @endif
    @endforeach

@endsection