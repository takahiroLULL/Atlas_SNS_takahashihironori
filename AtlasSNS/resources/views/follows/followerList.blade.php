@extends('layouts.login')

@section('content')
<form action="/follower-list" method="GET">
Follower list
@foreach($users as $user)
@if(Auth::user()->isFollowed($user->id))

<a href="/user/{{$user->id}}">
<img src="{{asset('storage/images/' .  $user->images)}}" ></a>

@endif
@endforeach
@foreach($posts as $post)
@if(Auth::user()->isFollowed($post->user_id))

<p>
<hr>
<div class="follwer-post">
<a href="/user/{{$post->user_id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}">
</a>
<p><td>{{ $post->user->username }}</td></p></a>

<p><td>{{ $post->post }}</td>
<td>{{ $post->created_at }}</td></p>
                
</p>
</hr>
</div>
                @endif
    @endforeach
   
</form>

@endsection