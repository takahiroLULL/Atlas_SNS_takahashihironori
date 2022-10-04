@extends('layouts.login')

@section('content')
<form action="/follow-list" method="GET">
<p>Follow list</p>
@foreach($images as $image)
@if(Auth::user()->isFollowing($image->id))

<a href="/user/{{$image->id}}">
<img src="{{  asset('/storage/images/' . $image->images) }}"></a>

@endif
@endforeach

@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user_id))

<p>
<img src="{{  asset('/storage/images/' . $post->user->images) }}">
<td>{{ $post->user->username }}</td></a>
               
              
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                
                </p>
                @endif
    @endforeach
   
</form>

@endsection


