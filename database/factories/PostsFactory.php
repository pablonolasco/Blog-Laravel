<?php

use Faker\Generator as Faker;
use App\User;
use App\Forum;
$factory->define(App\Post::class, function (Faker $faker) {
    //====== sentencia para crear la url amigable
    $title=$faker->sentence;
    return [
        //toma usuarios y foros randoms de los existentes
        'user_id'=>User::all()->random()->id,
        'forum_id'=>Forum::all()->random()->id,
        'title'=>$title,
        'description'=>$faker->paragraph,
        'slug'=>str_slug($title,'-'),
        'attachment'=> \Faker\Provider\Image::image(storage_path().'/app/posts',200,200,'technics',false),
    ];
    //================ http://lorempixel.com/ de aqui obtiene las img
});
