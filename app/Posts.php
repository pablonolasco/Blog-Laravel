<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table='posts';
    protected $fillable=['forum_id','user_id','title','description'];

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
}
