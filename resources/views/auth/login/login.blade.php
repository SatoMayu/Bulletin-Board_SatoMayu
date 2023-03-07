@extends('logout')

@section('content')
<div>
  <form action=" {{ route('loginPost') }}" method="POST">
    <div>
      <label for="">メールアドレス</label>
      <input type="text" name="mail_address">
    </div>
    <div>
      <label for="">パスワード</label>
      <input type="text" name="password">
    </div>
    <div>
      <input type="submit" value="ログイン">
    </div>

    <div>
      <a href="{{ route('registerView') }}">新規登録</a>
    </div>
    {{ csrf_field() }}

@endsection
