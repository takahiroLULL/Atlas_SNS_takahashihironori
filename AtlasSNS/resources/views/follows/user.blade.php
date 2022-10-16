@extends('layouts.login')

@section('content')

<img src="{{asset('storage/images/' .  $user_id->images)}}" >

<p>name  {{$user_id->username}}  </p>

<p> bio  {{$user_id->bio}} </p>

@if(auth()->user()->isFollowing($user_id->id))
        <td>
            <form action="{{ route('unfollow',['id'=>$user_id->id]) }}" method="post">
                <input type="submit" value="フォロー解除" class="unfollow-btn">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </td>
        @else
        <td>
            <form action="{{ route('follow',['id'=>$user_id->id]) }}"  method="post">
            {{ csrf_field() }} 
                <input type="submit" value="フォローする" class="follow-btn">
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
