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
        {{$user->username}}
</p>
@endforeach


@endsection