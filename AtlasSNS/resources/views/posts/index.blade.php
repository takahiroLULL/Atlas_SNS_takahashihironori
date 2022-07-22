@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/create','method'=>'Post']) !!}
<div>
        <div>
            <input name="newPost" placeholder="投稿内容を入力してください"></input>
        </div>
        <button type="submit"><img src="images/post.png"></button>
</div>
{!! Form::close() !!}
@foreach($posts as $post)

<p>
<td>{{ $post->user->username }}</td><!--リレーションしたやつはテーブル名も書く必要がある-->
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <div class="content">
                <td><a class="js-modal-open" href="{{$post->id}}" post="{{$post->post}}" post_id="{{$post->id}}"><img src="images/edit.png" ></a></td>
                <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"></a></td>
</div>
</p>

@endforeach
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{route('posts.update',$post->id)}}" method="POST"><!--このルートで書く場合はweb.phpにnameを記入してあげる-->
               {{csrf_field()}}
                <textarea name="text" class="modal_post"></textarea>
                <input type="hidden" name="post" class="modal_id" value="PUT">
                <input type="submit" value="更新">
           </form>
           <a class="js-modal-close">閉じる</a>
        </div>
    </div>

@endsection