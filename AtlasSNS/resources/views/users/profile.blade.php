@extends('layouts.login')

@section('content')



<form action="{{route('users.profileup')}}" enctype="multipart/form-data" method="post">
        
{{ csrf_field() }}

@foreach($errors->all() as $error)
<p class="text-danger">{{$error}}
@endforeach
<div class="profile">
<img src="{{  asset('/storage/images/' . Auth::user()->images) }}" class="user-icon">
        <p class="p-name">username:<input type="text" name="username" value="{{ Auth::user()->username }}"><br></p>
        <p class="p-mail">E-mail Adress:<input type="text" name="mail" value="{{ Auth::user()->mail }}"><br></p> 
        <p class="p-password">password:<input type="password" name="password" ><br></p>
        <p class="p-confirmation">password confirmation:<input type="password" name="password confirmation"><br></p> 
        <p class="p-bio">bio:<input type="text" name="bio" value="{{ Auth::user()->bio }}"><br></p> 
        <p class="p-img">icon image: <input type="file" name="iconimage"><br></p> 

<input type='submit' value='更新' class="profile-btn">
</div>
{!! Form::close() !!}

@endsection