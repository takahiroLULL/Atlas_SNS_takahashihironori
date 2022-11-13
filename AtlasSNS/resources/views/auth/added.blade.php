@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{ $username }}さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p><a href="/login"><button class="btn btn-danger">ログイン画面へ</button></a></p>
</div>

@endsection