<?php

namespace App\Http\Controllers;

use App\Forum;

use App\Posts;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index(){
        //trae el ultimo al primero
        $forums=Forum::latest()->paginate(5);
        return view('forums.index',compact('forums'));

    }

    public function show(Forum $forums)
    {
       $posts=$forums->posts()->with(['owner'])->paginate(2);
       dd($posts);
    }
}
