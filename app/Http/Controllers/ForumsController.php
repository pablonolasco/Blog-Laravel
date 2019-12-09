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
        //relacion con posts
        
        $forums=Forum::with(['post'])->paginate(2);
     
        return view('forums.index',compact('forums'));

    }

    public function show($forums)
    {
        try{
            $foros=Forum::findOrFail($forums);
            $posts=$foros->post()->with(['owner'])->paginate(2);
            return view('forums.detail',compact('posts','foros'));
        }catch(Exception $e){
            dd($e->getMessage());
        }
       
    }

    public function store(Request $request){
        try{
          
           $this->validate($request,[
            'name'=>'required|min:3',
            'description'=>'required|min:3'
           ]);
            Forum::create($request->all());
            //========regresa a la pagina anterior con un mensaje
            return back()->with('message',['success',__('Foro creado correctamente')]);
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
