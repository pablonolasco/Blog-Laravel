<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['forum_id','user_id','title','description'];

    // TODO metodo que se inicia cuando se esta creado un post y se obtiene el id del usuario
    protected static function boot(){
        parent::boot();
        static::creating(function($post){
            if(!App::runningInConsole){
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
}
