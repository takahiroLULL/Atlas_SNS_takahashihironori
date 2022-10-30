@extends('layouts.logout')

@section('content')
<div class="login-body">
{!! Form::open(['url' => '/login','class' => 'center-block']) !!} <!--ここからformタグ処理開始-->


<p>AtlasSNSへようこそ</p>

<p>{{ Form::label('e-mail',) }}
{{ Form::text('mail',null,['class' => 'input']) }}
</p>
<p>{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</p>
<p class="text-center">{{ Form::submit('LOGIN',['class' => 'btn btn-danger ']) }}</p>

<p class="text-center"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!} <!--ここまでformタグ処理-->
</div>
@endsection