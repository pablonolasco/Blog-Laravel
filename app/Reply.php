<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Reply extends Model
{
    
    protected $table='replies';
    protected $fillable=['user_id','post_id','reply'];

    //======crear atributos extras para acceder a otras tablas
    protected $appends=['forum'];

     // TODO metodo que se inicia cuando se esta creado un post y se obtiene el id del usuario
     protected static function boot(){
        parent::boot();
        static::creating(function($reply){
            if(!App::runningInConsole()){
                // sino se esta ejecutando por linea de comando
                 $reply->user_id=auth()->id();// ===== obtiene el id del usuario autenticado
            }

        });
    }
    //======relacion 1 a 1, respuesta pertenece a un post
    public function post()
    {
       return $this->belongsTo(Post::class,'post_id');
    }
    //======= una respuesta tiene un autor
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    //=======metodo para obtener los foros, la nomenclatura para atributos extras es getCampoAttribute
    protected function getForumAttribute()
    {
       return $this->post->forum;
    }

}
