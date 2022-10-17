@extends('layouts.login')

@section('content')



<form action="{{route('users.profileup')}}" enctype="multipart/form-data" method="post">
        
{{ csrf_field() }}

@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
<div class="profile">
<img src="{{  asset('/storage/images/' . Auth::user()->images) }}">
        username:<input type="text" name="username" value="{{ Auth::user()->username }}"><br>
        E-mail Adress:<input type="text" name="mail" value="{{ Auth::user()->mail }}"><br>
        password:<input type="password" name="password" ><br>
        password confirmation:<input type="password" name="password confirmation"><br>
        bio:<input type="text" name="bio" value="{{ Auth::user()->bio }}"><br>
        icon image: <input type="file" name="iconimage"><br>

<input type='submit' value='更新' class="profile-btn">
</div>
{!! Form::close() !!}

@endsection