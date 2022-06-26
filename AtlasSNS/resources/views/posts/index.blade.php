@extends('layouts.login')

@section('content')
<div>
    <form action="{{ route('posts.create') }}" method="POST">
        <div>
            <input name="content" placeholder="投稿内容を入力してください"></input>
        </div>
        <button><img src="images/post.png"></button>
    </form>
</div>

@endsection