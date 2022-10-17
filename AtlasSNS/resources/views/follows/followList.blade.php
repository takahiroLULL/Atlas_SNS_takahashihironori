@extends('layouts.login')

@section('content')
<form action="/follow-list" method="GET">
Follow list
@foreach($images as $image)
@if(Auth::user()->isFollowing($image->id))

<a href="/user/{{$image->id}}">
<img src="{{  asset('/storage/images/' . $image->images) }}"></a>

@endif
@endforeach

@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user_id))
<hr>
<p>
<a href="/user/{{$image->id}}">
<img src="{{  asset('/storage/images/' . $post->user->images) }}">
</a>
<p><td>{{ $post->user->username }}</td</p></a>
               
              
                <p><td class="post">{{ $post->post }}</td><td class="current_timestamp">{{ $post->created_at }}</td></p>
                
                
                </p>
</hr>
                @endif
    @endforeach
   
</form>

@endsection


