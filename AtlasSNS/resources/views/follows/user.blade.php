@extends('layouts.login')

@section('content')

<img src="{{asset('storage/images/' .  $user_id->images)}}" >

<p>name  {{$user_id->username}}  </p>

<p> bio  {{$user_id->bio}} </p>

@if(auth()->user()->isFollowing($user_id->id))
        <td>
            <form action="{{ route('unfollow',['id'=>$user_id->id]) }}" method="post" class="unfollow-btn">
                <input type="submit" value="フォロー解除">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </td>
        @else
        <td>
            <form action="{{ route('follow',['id'=>$user_id->id]) }}"  method="post" class="follow-btn">
            {{ csrf_field() }} 
                <input type="submit" value="フォローする">
            </form>
        </td>
        @endif

@foreach($posts as $post)

<td>{{ $post->post }}</td>

<td>{{ $post->created_at }}</td>

@endforeach
@endsection
