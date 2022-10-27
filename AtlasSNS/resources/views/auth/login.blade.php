@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login','class' => 'center-block']) !!} <!--ここからformタグ処理開始-->

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail',) }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN',['class' => 'btn btn-danger']) }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!} <!--ここまでformタグ処理-->

@endsection