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
}
