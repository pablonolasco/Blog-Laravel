<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class Post extends Model
{
    protected $table='posts';
    protected $fillable=['forum_id','user_id','title','description','slug'];

     //=================== indicamos que utilza el slug como parametro
     public function getRouteKeyName()
     {
         return 'slug';
     }
    // TODO metodo que se inicia cuando se esta creado un post y se obtiene el id del usuario
    protected static function boot(){
        parent::boot();
        static::creating(function($post){
            if(!App::runningInConsole()){
                // sino se esta ejecutando por linea de comando
                 $post->user_id=auth()->id();
            }

        });
    }
    // TODO 1:1
    public function forum()
    {
        //return $this->belongsTo(Forum::class,'forum_id');
        return $this->belongsTo(Forum::class,'forum_id');
    }

    // TODO 1:1
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // 1:M tiene muchas respuestas
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    //=================='/images/{path}/{attachment}' obtiene la ruta de la imagen
    public function pathAttachment()
    {
       return '/images/posts/'.$this->attachment;
    }

}
