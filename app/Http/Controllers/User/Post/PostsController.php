<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Post;
use App\Models\Posts\PostMainCategory;
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
  $post = Post::with('user')->findOrFail($post_id);
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
}
