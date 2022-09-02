@extends('layouts.login')

@section('content')
<form action="/follow-list" method="GET"></form>



@foreach($all_users as $user)


<td class="user-icon"><img src={{$user->images}}></td>


@endforeach
@endsection