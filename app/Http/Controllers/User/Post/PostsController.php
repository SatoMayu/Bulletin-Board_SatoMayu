<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Post;
use App\Models\Posts\PostComment;
use App\Models\Posts\PostMainCategory;
use App\Models\Posts\PostSubCategory;
use Auth;

class PostsController extends Controller
{
  public function show(Request $request){
    $posts = Post::with('user','subCategories')->get();
    $categories =
    PostMainCategory::with('subCategories')->get();

    if(!empty($request->keyword)){
      $posts = Post::with('user')
      ->where('title','like','%'.$request->keyword.'%')
      ->orWhere('post','like','%'. $request->keyword.'%')->get();
    }else if($request->category_word){
      $sub_category = $request->category_word;
      $posts = Post::with('user','subCategories')
      ->whereHas('subCategories',function($q)
      use($sub_category){
        $q->where('sub_category',$sub_category);
      })->get();
    }
    return view('authenticated.bulletinboard.posts', compact('posts','categories'));
  }

public function postDetail($post_id){
  $post = Post::with('user','subCategories','postComments')->findOrFail($post_id);
  return view('authenticated.bulletinboard.post_detail',compact('post'));
}

  public function postInput(){
    $main_categories = PostMainCategory::with('subCategories')->get();
    return view('authenticated.bulletinboard.post_createForm',compact('main_categories'));
  }

  public function postCreate(Request $request) {
    // dd($request);
    $d = now();

    $post = Post::create([
      'user_id' => Auth::id(),
      'title' => $request->post_title,
      'post' => $request->post_body,
      'post_sub_category_id' => $request->post_sub_category_id,
      'event_at' => $d,
    ]);

    $post = Post::findOrFail($post->id);
    $post_category = $request->post_sub_category_id;
    $post->subCategories()->attach($post_category);

    return redirect()->route('top.show');

  }

  public function categoryInput(){
    $main_categories = PostMainCategory::with('subCategories')->get();

    return view ('authenticated.bulletinboard.category_createForm',compact('main_categories'));
  }

  // ↓↓まとめられそう？？↓↓
  public function mainCategoryCreate(Request $request){
    PostMainCategory::create([
      'main_category' => $request->main_category_name
    ]);
    return redirect()->route('category.input');
  }

  public function subCategoryCreate(Request $request){
    // dd($request);
    PostSubCategory::create([
      'post_main_category_id' => $request->main_category_id,
      'sub_category' => $request->sub_category_name
    ]);
    return redirect()->route('category.input');
  }
  // ↑↑まとめられそう？？↑↑

  public function mainCategoryDelete($id){
    PostMainCategory::findOrFail($id)->delete();
    return redirect()->route('category.input');
  }

  public function subCategoryDelete($id){
    PostSubCategory::findOrFail($id)->delete();
    return redirect()->route('category.input');
  }


}
