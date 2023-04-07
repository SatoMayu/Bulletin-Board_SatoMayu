<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Post;
use App\Models\Posts\PostMainCategory;
use Auth;

class PostsController extends Controller
{
  public function show(){
    $posts = Post::with('user','subCategories')->get();
    // dd($posts);
    return view('authenticated.bulletinboard.posts', compact('posts'));
  }

  // public function post_createForm(){
  //   return view('authenticated.bulletinboard.post_createForm');
  // }

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
