<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Post;

class PostsController extends Controller
{
  public function show(){
    return view('authenticated.bulletinboard.posts');
  }

  public function postCreate_form(){
    return view();
  }
  public function postCreate() {
    // dd($request);
    // $post = Post::create([
    //   'user_id' => Auth::id(),
    //   'post_title' => $request->post_title,
    //   'post' => $request->post_body
    // ]);

    return redirect()->route('top.show');

  }
}
