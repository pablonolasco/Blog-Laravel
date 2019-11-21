<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    
    protected $table='replies';
    protected $fillable=['user_id','post_id','reply'];

    //======crear atributos extras para acceder a otras tablas
    protected $appends=['forum'];
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
