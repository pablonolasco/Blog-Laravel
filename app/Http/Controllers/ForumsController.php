<?php

namespace App\Http\Controllers;

use App\Forum;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ForumsController extends Controller
{
    public function index(){
        //trae el ultimo al primero
        //$forums=Forum::latest()->paginate(5);
        $forums=Forum::with(['posts'])->paginate(2);
        return view('forums.index',compact('forums'));

    }

    public function show($forums)
    {
       $foros=Forum::findOrFail($forums);
       $posts=$foros->posts()->with(['owner'])->paginate(2);
       return view('forums.detail',compact('posts','foros'));
    }
}
