<?php

use Faker\Generator as Faker;
use App\User;
$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        //
        'user_id'=>User::all()->random()->id,
        'post_id'=>\App\Posts::all()->random()->id,
        'reply'=>$faker->paragraph
    ];
});
