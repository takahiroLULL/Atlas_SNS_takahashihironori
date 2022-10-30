@extends('layouts.login')

@section('content')
<div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/search" method="GET">
        @csrf
        <div>
            <input name="keyword" placeholder="ユーザー名" ></input><button type="submit" ><img src="images/search.png" class="user-icon"></button>
        </div>
        
        <!-- 空じゃなかったら -->
        @if(!empty($keyword))
        <p>
        検索ワード:{{ $keyword }}
        </p>
        @endif
    </form>
</div>
<hr>
@foreach($users as $user)
<!-- !で自分以外のユーザーを表示 -->
@if ($user->id !== Auth::user()->id)
<div class = "search-user">
<p>
        <td class="user-icon"><img src="{{asset('storage/images/' .  $user->images)}}" ></td>
        <td>{{$user->username}}</td>
        @if(auth()->user()->isFollowing($user->id))
        <td>
            <form action="{{ route('unfollow',['id'=>$user->id]) }}" method="post" >
                <input type="submit" value="フォロー解除" class="btn btn-danger">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </td>
        @else
        <td>
            <form action="{{ route('follow',['id'=>$user->id]) }}"  method="post" >
            {{ csrf_field() }} 
                <input type="submit" value="フォローする" class="btn btn-primary">
            </form>
        </td>
        @endif
</p>
</div>
@endif
@endforeach


@endsection








