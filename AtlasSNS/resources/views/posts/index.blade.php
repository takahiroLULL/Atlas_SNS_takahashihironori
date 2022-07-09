@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/top']) !!}
<div>
        <div>
            <input name="newPost" placeholder="投稿内容を入力してください"></input>
        </div>
        <button type="submit"><img src="images/post.png"></button>
</div>
{!! Form::close() !!}
@foreach($posts as $post)

<p>
<td>{{ $user }}</td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form"><img src="images/edit.png" ></a></td>
</p>

@endforeach

@endsection