@extends('layouts.login')

@section('content')
<form action="/follow-list" method="GET">
@foreach($images as $image)

<img src="{{  asset('/storage/images/' . Auth::user()->isFollowing($image->images)) }}">

@endforeach

@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user_id))
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


