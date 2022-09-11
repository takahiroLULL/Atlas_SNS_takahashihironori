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
<!-- !で自分以外のユーザーを表示 -->
@if ($user->id !== Auth::user()->id)
    <p>
        <td class="user-icon"><img src={{$user->images}}></td>
        <td>{{$user->username}}</td>
        @if(auth()->user()->isFollowing($user->id))
        <td>
            <form action="{{ route('unfollow',['id'=>$user->id]) }}" method="post" class="unfollow-btn">
                <input type="submit" value="フォロー解除">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </td>
        @else
        <td>
            <form action="{{ route('follow',['id'=>$user->id]) }}"  method="post" class="follow-btn">
            {{ csrf_field() }} 
                <input type="submit" value="フォローする">
            </form>
        </td>
        @endif

</p>
@endif
@endforeach


@endsection








