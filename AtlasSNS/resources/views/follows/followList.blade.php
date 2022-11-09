@extends('layouts.login')

@section('content')
<div id="follower-form">
<form action="/follow-list" method="GET">
<div class="follower-text"><h3>Follow list</h3></div>

<div class="follower-img">
@foreach($users as $user)
@if(Auth::user()->isFollowing($user->id))
<div class="each-img">
<a href="/user/{{$user->id}}">
<img src="{{  asset('/storage/images/' . $user->images) }}" class="user-icon"></a>
</div>
@endif
@endforeach
</div>
</div>
@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user_id))
<div class="user-show">
<p>
<div>
<!-- 誰の投稿のIDを表示するか、、 投稿->ユーザー-->
<a href="/user/{{$post->user_id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}" class="user-icon">
</a>
</div>

<div class="user-post">
<div class="user-name">
<p>{{ $post->user->username }}<div class="user-created_at">{{ $post->created_at }}</div></p>
</div>
<div class="post-max">
<p>{{ $post->post }}</p>
</div>
</div>
</div>
<hr>         

                @endif
    @endforeach
   
</form>

@endsection


