@extends('layouts.login')

@section('content')
<div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="{{ route('users.search') }}" method="GET">
        <div>
            <input name="content" placeholder="ユーザー名"></input>
        </div>
        <button type="submit" action="{{ route('users.search') }}" method="GET"><img src="images/search.png"></button>
    </form>
</div>

@endsection