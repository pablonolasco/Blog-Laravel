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
    // 1 a
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    //metodo para obtener los foros, la nomenclatura para atributos extras es getCampoAttribute
    protected function getForumAttribute()
    {
        return $this->post->forum;
    }

}
