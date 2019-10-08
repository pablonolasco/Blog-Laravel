<?php

namespace App\Http\Controllers;

use App\Forum;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ForumsController extends Controller
{
    public function index(){
        //trae el ultimo al primero
        $forums=Forum::latest()->paginate(5);
        return view('forums.index',compact('forums'));

    }

    public function show(Forum $forums)
    {
      //  $foro=Forum::findOrFail($forums);
       dd($forums);
    }
}
