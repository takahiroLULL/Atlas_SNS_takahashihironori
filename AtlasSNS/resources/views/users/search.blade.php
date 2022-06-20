@extends('layouts.login')

@section('content')
<div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/search" method="GET">
        @csrf
        <div>
            <input name="keyword" placeholder="ユーザー名" ></input>
        </div>
        <button type="submit" ><img src="images/search.png"></button>
    </form>
</div>

@foreach($users as $user)
    <p>
        {{$user->username}}
</p>
@endforeach


@endsection