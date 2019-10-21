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
        return $this->hasMany(Posts::class);
    }

    //relacion a distanciam
    protected function replies()
    {
        //(clase mas lejos,clase enlace )
        return $this->hasManyThrough(Reply::class,Posts::class);
    }
}
