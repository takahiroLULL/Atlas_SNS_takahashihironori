@extends('layouts.login')

@section('content')



<form action="{{route('users.profileup')}}" enctype="multipart/form-data" method="post">
        
{{ csrf_field() }}


        <div class="usericon">
<img src="{{  asset('/storage/images/' . Auth::user()->images) }}" width="65px" height="65px">
       </div>
<div class="user-up">
        <div class="up-name"><td><br><h5>user name:</h5></div><input type="text" name="username" value="{{ Auth::user()->username }}"></br></td>
        @error('username')
  <p class="text-danger">{{$message}}</p>
@enderror
 
<div class="up-mail"><td><br><h5>E-mail Adress</h5></div><input type="text" name="mail" value="{{ Auth::user()->mail }}"><br></td>
        @error('mail')
  <p class="text-danger">{{$message}}</p>
@enderror


<div class="up-password"><td><br><h5>password</h5></div><input type="password" name="password" ><br></td>
        @error('password')
  <p class="text-danger">{{$message}}</p>
@enderror

<div class="up-passwordcofirmation"><td><br><h5>password confirmation</h5></div><input type="password" name="password confirmation"><br></td>
        @error('password')
  <p class="text-danger">{{$message}}</p>
@enderror

<div class="up-bio"><td><br><h5>bio</h5></div><input type="text" name="bio" value="{{ Auth::user()->bio }}"><br></td>
        @error('bio')
  <p class="text-danger">{{$message}}</p>
@enderror

<div class="up-image"><td><br><h5>icon image</h5></div><input type="file" name="iconimage"><br></td>
        @error('iconimage')
  <p class="text-danger">{{$message}}</p>
@enderror

</div>
<div class="up-btn">
<br><input type='submit' value='更新' class="btn btn-danger"></br>
</div>
{!! Form::close() !!}

@endsection