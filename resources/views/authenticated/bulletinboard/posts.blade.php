@extends('bottom_menu')

@section('content')

<div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">掲示板投稿一覧</p>
    <p class="">{{ Auth::user()->username }} ログイン中</p>
</div>

<div>
    @foreach($posts as $post)
    <div>
        <p>{{ $post->user->username }}さん</p>
        <p>日付 {{ $post->event_at->format('Y年m月d日') }}</p>
        <p>view</p>
        <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
        <p>サブカテゴリー</p>
        @foreach($post->SubCategories as $sub_category)
        <p>{{ $sub_category->sub_category }}</p>

        @endforeach
        <p>コメント数</p>
        <p>いいね数</p>
    </div>
    @endforeach
</div>
<div class="post_search_area">
    <div>
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
    </div>
</div>
<div class="filter-btn">
    <div>
        <input type="submit" name="like_posts" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" value="自分の投稿" form="postSearchRequest">
    </div>
</div>
<div>
    <ul>
        @foreach($categories as $category)
        <li>
            <span>{{ $category->main_category }}</span>
        </li>
        <ul>
            @foreach($category->SubCategories as $sub_category)
            <li>
                <input type="submit" name="category_word" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
            </li>
            @endforeach
        </ul>
        @endforeach
    </ul>
</div>
<form action="{{ route('top.show') }}" method="get" id="postSearchRequest"></form>
@endsection
