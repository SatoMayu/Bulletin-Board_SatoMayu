@extends('logout')

@section('content')

  <div>
    <form action="" method="POST">
      <div>
        <label for="">ユーザー名</label>
        <input type="text" name="username">
      </div>
      <div>
        <label for="">メールアドレス</label>
        <input type="mail" name="mail_address">
      </div>
      <div>
        <label for="">パスワード</label>
        <input type="password" name="password">
      </div>
      <div>
        <label for="">パスワード確認</label>
        <input type="password" name="password_confirmation">
      </div>
      <div>
        <input type="submit" value="確認">
      </div>

      {{ csrf_field() }}

@endsection
