<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table='forums';
    protected $fillable=['name','description'];

    // TODO 1:M
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //relacion a distancia

    protected function replies()
    {
        //(clase mas lejos,clase enlace)
        return $this->hasManyThrough(Reply::class,Post::class);
    }
}
