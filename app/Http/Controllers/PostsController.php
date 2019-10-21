<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        $replices=$post->replies()->with(['author'])->paginate(2);
        return view('posts.detail',compact('post','replices'));
    }

}

