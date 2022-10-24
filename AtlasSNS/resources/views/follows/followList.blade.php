@extends('layouts.login')

@section('content')
<form action="/follow-list" method="GET">
Follow list
@foreach($users as $user)
@if(Auth::user()->isFollowing($user->id))

<a href="/user/{{$user->id}}">
<img src="{{  asset('/storage/images/' . $user->images) }}" ></a>

@endif
@endforeach
@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user_id))

<p>
<hr>
<div class="follow-post">
<!-- 誰の投稿のIDを表示するか、、 投稿->ユーザー-->
<a href="/user/{{$post->user_id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}">
</a>
<p><td>{{ $post->user->username }}</td></p></a>
               

<p><td class="post">{{ $post->post }}</td>
<td class="current_timestamp">{{ $post->created_at }}</td></p>
 
</p>
</hr>             
</div>
                @endif
    @endforeach
   
</form>

@endsection


