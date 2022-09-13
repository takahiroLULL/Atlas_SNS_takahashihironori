@extends('layouts.login')

@section('content')
<form action="/follow-list" method="GET">

@foreach($images as $image)
@if(Auth::user()->isFollowing($image->id))
<img src="{{  asset('/storage/images/' . $image->images) }}">
@endif
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


