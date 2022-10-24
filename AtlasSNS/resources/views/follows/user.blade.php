@extends('layouts.login')

@section('content')

<img src="{{asset('storage/images/' .  $user_id->images)}}" >

name  {{$user_id->username}}

bio  {{$user_id->bio}} 

@if(auth()->user()->isFollowing($user_id->id))
        <td>
            <form action="{{ route('unfollow',['id'=>$user_id->id]) }}" method="post">
                <input type="submit" value="フォロー解除" class="btn btn-danger">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </td>
        @else
        <td>
            <form action="{{ route('follow',['id'=>$user_id->id]) }}"  method="post">
            {{ csrf_field() }} 
                <input type="submit" value="フォローする" class="btn btn-primary">
            </form>
        </td>
        @endif

@foreach($posts as $post)

<hr>
<img src="{{  asset('/storage/images/' . $post->user->images) }}">
<p>{{$user_id->username}}  </p>
<td>{{ $post->post }}</td>

<td>{{ $post->created_at }}</td>
</hr>
@endforeach
@endsection
