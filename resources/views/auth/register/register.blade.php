@extends('logout')

@section('content')

<div>
  <form action="{{ route('registerPost') }}" method="POST">
    <div>
      <label for="{{ route('registerPost') }}">ユーザー名</label>
      <input type="text" name="username">
      <span>{{$errors->first('username')}}</span>
    </div>
    <div>
      <label for="{{ route('registerPost') }}">メールアドレス</label>
      <input type="mail" name="email">
      <span>{{$errors->first('email')}}</span>
    </div>
    <div>
      <label for="{{ route('registerPost') }}">パスワード</label>
      <input type="password" name="password">
      <span>{{$errors->first('password')}}</span>
    </div>
    <div>
      <label for="{{ route('registerPost') }}">パスワード確認</label>
      <input type="password" name="password_confirmation">
    </div>
    <div>
      <input type="submit" value="確認">
    </div>

    {{ csrf_field() }}
  </form>
  @endsection
