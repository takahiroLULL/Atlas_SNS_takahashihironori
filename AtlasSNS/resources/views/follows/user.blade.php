@extends('layouts.login')

@section('content')
<div id="user-pr">
<img src="{{asset('storage/images/' .  $user_id->images)}}" class="user-icon">

<div class="user-bio">
<p><h6>name  {{$user_id->username}} </h6></p>

<p><h6>bio  {{$user_id->bio}} </h6> </p>
</div>
<div class="userbtn">
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
        </div>
        </div>
@foreach($posts as $post)
<div class="user-show">
<div class="each-img">
<img src="{{  asset('/storage/images/' . $post->user->images) }}"></div>
<div class="user-post">
<div class="user-name">
<p>{{ $post->user->username }}<div class="user-created_at">{{ $post->created_at }}</div></p>
</div>
<div class="post-max">
<p>{{ $post->post }}</p>
</div>
</div>
</div>
<hr>  
@endforeach
@endsection
