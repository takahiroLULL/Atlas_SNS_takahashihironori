@extends('layouts.login')

@section('content')
<div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/search" method="GET">
        @csrf
        <div>
            <input name="keyword" placeholder="ユーザー名" ></input>
        </div>
        <button type="submit" ><img src="images/search.png"></button>
        @if(!empty($keyword))
        <p>
        検索ワード:{{ $keyword }}
        </p>
        @endif
    </form>
</div>

@foreach($users as $user)
    <p>
        <td class="user-icon"><img src={{$user->images}}></td>
        <td>{{$user->username}}</td>
        @if(auth()->user()->isFollowing($user->id))
        <td>
            <form action="/unfollow" method="post" class="unfollow-btn">
                <input type="hidden" name="unfollowing_id" class="unfollowing_id" value="{{ $user->id }}">
                <input type="submit" value="フォロー解除">
                {{ csrf_field() }}
            </form>
        </td>
        @else
        <td>
            <form action="/follow" method="post" class="follow-btn">
                <input type="hidden" name="following_id" class="following_id" value="{{ $user->id }}">
                <input type="submit" value="フォローする">
                {{ csrf_field() }}
            </form>
        </td>
        @endif
</p>
@endforeach


@endsection








