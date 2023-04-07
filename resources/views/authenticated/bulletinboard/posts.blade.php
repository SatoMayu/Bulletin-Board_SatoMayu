@extends('bottom_menu')

@section('content')

<div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">掲示板投稿一覧</p>
    <p class=""> ログイン中</p>
</div>
@foreach($posts as $post)
<div>
    <p>{{ $post->user->username }}さん</p>
    <p>日付 {{ $post->event_at->format('Y年m月d日') }}</p>
    <p>view</p>
    <p>タイトル『{{ $post->title }}』</p>
    <p>サブカテゴリー</p>
    @foreach($post->SubCategories as $sub_category)
        <p>{{ $sub_category->sub_category }}</p>

    @endforeach
    <p>コメント数</p>
</div>
@endforeach
@endsection
