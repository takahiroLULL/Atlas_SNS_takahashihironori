@extends('layouts.login')

@section('content')
<div class="search-form">

    <form action="/search" method="GET">
        @csrf
        
            <input name="keyword" placeholder="ユーザー名" >
            <button type="submit" width="10%"><img src="images/search.png" class="user-icon"></button>
        
        
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
        <div class="search-img">
        <td><img src="{{asset('storage/images/' .  $user->images)}}"  class="user-icon"></td>
        </div>
        <div class="search-nema">
        <td>{{$user->username}}</td>
        </div>
        <div class="followbtn">
        @if(auth()->user()->isFollowing($user->id))
            <form action="{{ route('unfollow',['id'=>$user->id]) }}" method="post" >
                <input type="submit" value="フォロー解除" class="btn btn-danger">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        @else
            <form action="{{ route('follow',['id'=>$user->id]) }}"  method="post" >
            {{ csrf_field() }} 
                <input type="submit" value="フォローする" class="btn btn-primary">
            </form>
        @endif
        </div>
</p>
</div>
@endif
@endforeach


@endsection








