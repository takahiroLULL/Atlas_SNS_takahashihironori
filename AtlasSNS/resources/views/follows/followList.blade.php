@extends('layouts.login')

@section('content')
<div id="follow-form">
<form action="/follow-list" method="GET">

<div class="followtext"><h3>Follow list</h3></div>

@foreach($users as $user)
@if(Auth::user()->isFollowing($user->id))

<div class="follow-img">
<a href="/user/{{$user->id}}">
<img src="{{  asset('/storage/images/' . $user->images) }}" class="user-icon"></a>
</div>

@endif
@endforeach
</div>
@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user_id))

<p>

<div class="follow-post">
<!-- 誰の投稿のIDを表示するか、、 投稿->ユーザー-->
<a href="/user/{{$post->user_id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}" class="user-icon">
</a>
<td>{{ $post->user->username }}</td></a>
<td class="current_timestamp">{{ $post->created_at }}</td>            

<p><td class="post">{{ $post->post }}</td></p>

 
</p>
<hr>         
</div>
                @endif
    @endforeach
   
</form>

@endsection


