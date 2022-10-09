@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/create','method'=>'Post']) !!}
<div>
        <div>
            <input name="newPost" placeholder="投稿内容を入力してください"></input>
        </div>
        <button type="submit"><img src="images/post.png"></button>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
</div>
{!! Form::close() !!}

@foreach($posts as $post)
@if($post->user_id == Auth::id() || Auth::user()->isFollowing($post->user_id))
<p>
 <hr>   <!-- 変数  モデル カラム -->
<td>{{ $post->user->username }}</td><!--リレーションしたやつはテーブル名も書く必要がある-->
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                @if($post->user_id == Auth::id())
                <div class="content">
                <td><a class="js-modal-open" href="{{$post->id}}" post="{{$post->post}}" post_id="{{$post->id}}"><img src="images/edit.png" ></a></td>
                <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"></a></td>
</div>
</p>
@endif
</hr>
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{route('posts.update',$post->id)}}" method="POST"><!--このルートで書く場合はweb.phpにnameを記入してあげる-->
               {{csrf_field()}}
                <textarea name="text" class="modal_post"></textarea>
                <input type="hidden" name="post" class="modal_id" value="PUT">
                <input type="submit" value="更新">
           </form>
           <a class="js-modal-close"><input type="submit" value="閉じる"></a>
        </div>
    </div>
    @endif
    @endforeach

@endsection