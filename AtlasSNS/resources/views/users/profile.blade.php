@extends('layouts.login')

@section('content')



<form action="{{route('users.profileup')}}" enctype="multipart/form-data" method="post">
        
{{ csrf_field() }}


<div class="icon-up">
<img src="{{  asset('/storage/images/' . Auth::user()->images) }}" width="65px" height="65px">
</div>

<div id="profile-up">
<div class="up-user">
<h5 class="text-start">user name:</h5><input type="text" name="username" value="{{ Auth::user()->username }}">
</div>
<div class="error">
        @error('username')
  <p class="text-danger">{{$message}}</p>
@enderror
</div>

<div class="up-user">
<h5>E-mail Adress:</h5><input type="text" name="mail" value="{{ Auth::user()->mail }}">
</div>
<div class="error">
        @error('mail')
  <p class="text-danger">{{$message}}</p>
@enderror
</div>

<div class="up-user">
<h5>password:</h5><input type="password" name="password" >
        @error('password')
</div>
<div class="error">
  <p class="text-danger">{{$message}}</p>
@enderror
</div>

<div class="up-user">
<h5>password confirmation:</h5><input type="password" name="password confirmation">
</div>
<div class="error">
        @error('password')
  <p class="text-danger">{{$message}}</p>
@enderror
</div>

<div class="up-user">
<h5>bio:</h5><input type="text" name="bio" value="{{ Auth::user()->bio }}">
</div>
<div class="error">
        @error('bio')
  <p class="text-danger">{{$message}}</p>
@enderror
</div>


<div class="up-user">
<h5>icon image:</h5><div class="up-input"><label><input type="file" name="iconimage" >ファイルを選択</lavel></div>
</div>
<div class="error">
        @error('iconimage')
  <p class="text-danger">{{$message}}</p>
@enderror
</div>

<div class="up-btn">
<input type='submit' value='更新' class="btn btn-danger btn-lg" >
</div>

</div>
{!! Form::close() !!}

@endsection