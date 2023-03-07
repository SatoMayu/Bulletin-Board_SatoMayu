<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Post;
use Auth;

class PostsController extends Controller
{
  public function show(){
    return view('authenticated.bulletinboard.posts');
  }

  public function post_createForm(){
    return view('authenticated.bulletinboard.post_createForm');
  }
  public function postCreate(Request $request) {
    // dd($request);
    $post = Post::create([
      'user_id' => Auth::id(),
      'post_title' => $request->post_title,
      'post' => $request->post_body,
      
    ]);

    return redirect()->route('top.show');

  }
}
