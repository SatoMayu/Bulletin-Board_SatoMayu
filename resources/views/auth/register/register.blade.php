<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>HonmaruBulletinBoard</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Oswald:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
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

    </form>
  </div>
  <script src=" https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>
