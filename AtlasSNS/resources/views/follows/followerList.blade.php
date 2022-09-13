@extends('layouts.login')

@section('content')
<form action="/follower-list" method="GET">
@foreach($images as $image)
@if(Auth::user()->isFollowed($image->id))
<img src="{{asset('storage/images/' .  $image->images)}}">
@endif
@endforeach
@foreach($posts as $post)
@if(Auth::user()->isFollowed($post->user_id))
<p>
<td>{{ $post->user->username }}</td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                
                </p>
                @endif
    @endforeach
   
</form>

@endsection