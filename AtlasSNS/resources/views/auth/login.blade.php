@extends('layouts.logout')

@section('content')
<div id="login-body">
{!! Form::open(['url' => '/login','class' => 'center-block']) !!} <!--ここからformタグ処理開始-->

<div>
<h5><p class="text-center text-white">AtlasSNSへようこそ</p></h5>
<div class="login-form text-center">
<p class="text-white text-start">{{ Form::label('e-mail',) }}</p>
<p>{{ Form::text('mail',null,['class' => 'input']) }}</p>
</div>

<div class="login-form">
<p class="text-white text-start">{{ Form::label('password') }}</p>
<p>{{ Form::password('password',['class' => 'input']) }}</p>

<p class="text-center">{{ Form::submit('LOGIN',['class' => 'btn btn-danger ']) }}</p>
</div>

<p class="text-center "><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!} <!--ここまでformタグ処理-->
</div>
@endsection