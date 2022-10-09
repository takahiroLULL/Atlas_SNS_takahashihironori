@extends('layouts.login')

@section('content')
<form action="/follower-list" method="GET">
<p>Follower list</p>
@foreach($images as $image)
@if(Auth::user()->isFollowed($image->id))

<a href="/user/{{$image->id}}">
<img src="{{asset('storage/images/' .  $image->images)}}">
</a>
@endif
@endforeach
@foreach($posts as $post)
@if(Auth::user()->isFollowed($post->user_id))
<hr>
<p>
<a href="/user/{{$image->id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}">
</a>
<td>{{ $post->user->username }}</td>

                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                
                </p>
</hr>
                @endif
    @endforeach
   
</form>

@endsection