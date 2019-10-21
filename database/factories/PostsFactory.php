<?php

use Faker\Generator as Faker;
use App\User;
use App\Forum;
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //toma usuarios y foros randoms de los existentes
        'user_id'=>User::all()->random()->id,
        'forum_id'=>Forum::all()->random()->id,
        'title'=>$faker->sentence,
        'description'=>$faker->paragraph
    ];
});
