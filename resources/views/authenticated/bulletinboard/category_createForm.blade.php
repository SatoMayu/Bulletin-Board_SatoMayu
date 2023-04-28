@extends('bottom_menu')

@section('content')
<div>
  <h1>カテゴリー追加画面</h1>
</div>
<div>
  <form action="{{ route('main.category.create') }}" method="post" id="mainCategoryRequest">
    {{ csrf_field() }}
    <p>新規メインカテゴリー</p>
    <input type="text" name="main_category_name" form="mainCategoryRequest">
    <input type="submit" value="登録" form="mainCategoryRequest">
  </form>
</div>

<div>
  <form action="{{ route('sub.category.create') }}" method="post" id="subCategoryRequest">
    {{ csrf_field() }}
    <p>メインカテゴリー</p>
    <select name="main_category_id" form="subCategoryRequest">
      @foreach($main_categories as $main_category)
      <option value="{{ $main_category->id }}" label="" class="">{{ $main_category->main_category }}
      </option>
      @endforeach
    </select>
    <p>新規サブカテゴリー</p>
    <input type="text" name="sub_category_name" form="subCategoryRequest">
    <input type="submit" value="登録" form="subCategoryRequest">
  </form>
</div>
@endsection
