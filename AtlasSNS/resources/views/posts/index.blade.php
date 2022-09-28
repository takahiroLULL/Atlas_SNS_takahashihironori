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

@foreach($timelines as $timeline)
@if($timeline->user->id == Auth::id() || Auth::user->isFollowing($timeline->user->id))
<p>{{ $timeline->user->username }}</p><!--リレーションしたやつはテーブル名も書く必要がある-->
                <p>{{ $timeline->id }}</p>
                <p>{{ $timeline->user_id }}</p>
                <p>{{ $timeline->post }}</p>
                <p>{{ $timeline->created_at }}</p>
                <p>{{ $timeline->updated_at }}</p>
                <div class="content">
                <td><a class="js-modal-open" href="{{$timeline->id}}" post="{{$timeline->post}}" post_id="{{$timeline->id}}"><img src="images/edit.png" ></a></td>
                <td><a class="btn btn-danger" href="/post/{{$timeline->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"></a></td>
</div>
</p>

<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{route('posts.update',$timeline->id)}}" method="POST"><!--このルートで書く場合はweb.phpにnameを記入してあげる-->
               {{csrf_field()}}
                <textarea name="text" class="modal_post"></textarea>
                <input type="hidden" name="post" class="modal_id" value="PUT">
                <input type="submit" value="更新">
           </form>
           <a class="js-modal-close">閉じる</a>
        </div>
    </div>
@endif
    @endforeach

@endsection