@extends('layouts.logout')

@section('content')

{!! Form::open(['url'=>'/register']) !!} <!--formの開始タグ どこに飛ばすか-->
<div id="register">

<div class="register-new">
<p><h2 class="text-white">新規ユーザー登録</h2></p>
</div>


<div class="register-text">
<p class="text-start">{{ Form::label('ユーザー名') }}</p>
<p  class="text-start">{{ Form::text('username',null,['class' => 'input']) }}</p>
</div>

@error('username')
  <li class="text-danger">{{$message}}</li>
@enderror

<div class="register-text">
<p class="text-start">{{ Form::label('メールアドレス') }}</p>
<p class="text-start">{{ Form::text('mail',null,['class' => 'input']) }}</p>
</div>

@error('mail')
  <li class="text-danger">{{$message}}</li>
@enderror

<div class="register-text">
<p class="text-start">{{ Form::label('パスワード') }}</p>
<p class="text-start">{{ Form::password('password',null,['class' => 'input']) }}</p>
</div>

@error('password')
  <li class="text-danger">{{$message}}</li>
@enderror

<div class="register-text">
<p class="text-start">{{ Form::label('パスワード確認') }}</p>
<p class="text-start">{{ Form::password('password_confirmation',null,['class' => 'input']) }}</p>
</div>

@error('password')
  <li class="text-danger">{{$message}}</li>
@enderror


<p >{{ Form::submit('REGISTER',['class' => 'btn btn-danger']) }}</p>

<p><a href="/login" style="text-decoration:none" class="text-white">ログイン画面へ戻る</a></p>

{!! Form::close() !!} <!--formタグ終了-->


</div>

@endsection
