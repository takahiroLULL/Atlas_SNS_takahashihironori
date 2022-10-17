@extends('layouts.logout')

@section('content')

{!! Form::open(['url'=>'/register']) !!} <!--formの開始タグ どこに飛ばすか-->

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

@error('username')
  <li>{{$message}}</li>
@enderror

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

@error('mail')
  <li>{{$message}}</li>
@enderror

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

@error('password')
  <li>{{$message}}</li>
@enderror

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('REGISTER',['class' => 'register-btn']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!} <!--formタグ終了-->


@endsection
