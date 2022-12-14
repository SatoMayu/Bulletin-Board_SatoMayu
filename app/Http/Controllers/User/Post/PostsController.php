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
}
