@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/create']) !!}
<div>
        <div>
            <input name="newPost" placeholder="投稿内容を入力してください"></input>
        </div>
        <button type="submit"><img src="images/post.png"></button>
</div>
{!! Form::close() !!}
@endsection