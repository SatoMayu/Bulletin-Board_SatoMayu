@extends('bottom_menu')

@section('content')
<div>
  <div>

    <h1>掲示板詳細画面</h1>
    <p>
      {{ $post->user->username }}さん {{$post->event_at->format('Y年m月d日') }}
    </p>
    <h5>{{ $post->title }}</h5>
    <a href="" >編集</a>
    <p>{{ $post->post }}</p>
    @foreach($post->SubCategories as $sub_category)
    <p>{{ $sub_category->sub_category }}</p>
    @endforeach
    <p>コメント数</p>
    <p>いいね数</p>
  </div>
  <div>

  </div>
</div>


@endsection
