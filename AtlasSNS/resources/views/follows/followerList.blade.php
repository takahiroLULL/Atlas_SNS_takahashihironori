@extends('layouts.login')

@section('content')
<div id="follower-form">
<form action="/follower-list" method="GET">
<div class="follower-text"><td>Follower list</td></div>

<div class="follower-img">
@foreach($users as $user)
@if(Auth::user()->isFollowed($user->id))
<a href="/user/{{$user->id}}">
<img src="{{asset('storage/images/' .  $user->images)}}" ></a>

@endif
@endforeach
</div>
</div> 


@foreach($posts as $post)
@if(Auth::user()->isFollowed($post->user_id))
<div class="user-show">
<p>
<div class="user-icon">
<a href="/user/{{$post->user_id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}" >
</a>
</div> 


<div class="user-post">
<div class="user-name">
<p>{{ $post->user->username }}<div class="user-created_at">{{ $post->created_at }}</div></p>
</div>
<p>{{ $post->post }}</p>
  
</div>       

</div>
<hr>

                @endif
    @endforeach

</form>

@endsection