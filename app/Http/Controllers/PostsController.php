<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        $replices=$post->replies()->with(['author'])->paginate(2);
        return view('posts.detail',compact('post','replices'));
    }

    public function store(PostRequest $post_request){
        //$post_request->merge(['user_id'=> auth()->id()]);
        Post::create($post_request->input());
        return back()->with('message',['success','Post creado correctamente']);
    }

}

