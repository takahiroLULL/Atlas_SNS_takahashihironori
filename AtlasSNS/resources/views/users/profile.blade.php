@extends('layouts.login')

@section('content')



<p>{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}
</p>
<p>
{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</p>
<p>
{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}
</p>
<p>
{{ Form::label('password comfirm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
</p>
<p>
{{ Form::label('bio') }}
{{ Form::text('bio',null,['class' => 'input']) }}
</p>
<p>
{{ Form::label('icon image') }}
{{ Form::text('images',null,['class' => 'input']) }}
</p>

@endsection