@extends('bottom_menu')

@section('content')
<div class="post_create_area">
  <p>サブカテゴリー</p>
  <select form="postCreate" name="" id=""></select>
</div>

<div class="title">
  <p>タイトル</p>
  <input type="text" form="postCreate" name="post_title" value="">
</div>

<div>
  <p>投稿内容</p>
  <textarea form="postCreate" name="post_body" id="" cols="30" rows="10"></textarea>
</div>

<div>
  <input type="submit" value="投稿" form="postCreate">
</div>

<form action="{{ route('post.create') }}" method="post" id="postCreate">{{ csrf_field() }}
</form>

  @endsection
