<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Posts\PostComment;


class PostCommentsController extends Controller
{
    public function commentCreate(Request $request)
    {
        // dd($request);
        $d = now();
        PostComment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment_body,
            'event_at' => $d
        ]);
        return redirect()->route('post.detail', ['id' => $request->post_id]);
    }

}
