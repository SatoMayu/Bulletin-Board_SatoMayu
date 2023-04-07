@extends('bottom_menu')

@section('content')
<form action="{{ route('post.create') }}" method="post" id="postCreate">{{ csrf_field() }}
  <div class="post_create_area">
    <p>サブカテゴリー</p>
    <select form="postCreate" name="post_sub_category_id" id="postCreate">
      @foreach($main_categories as $main_category)
        <optgroup label="{{ $main_category->main_category }}" class="">
        </optgroup>
          @foreach($main_category->subCategories as $sub_category)
            <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
          @endforeach
      @endforeach
    </select>
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

</form>

  @endsection
