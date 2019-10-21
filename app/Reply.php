<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table='replies';
    protected $fillable=['user_id','post_id','reply'];

    //crear atributos extras para acceder a otras tablas
    protected $appends=['forum'];
    // 1 a 1
    public function posts()
    {
       return $this->belongsTo(Post::class,'post_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    //metodo para obtener los foros, la nomenclatura para atributos extras es getCampoAttribute
    protected function getForumAttribute()
    {
       return $this->posts->forum;
    }

}
