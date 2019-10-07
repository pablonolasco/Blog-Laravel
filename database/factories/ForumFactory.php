<?php

use Faker\Generator as Faker;

$factory->define(App\Forum::class, function (Faker $faker) {
    //datos fictios
    return [
        //
        'name'=>$faker->sentence,
        'description'=>$faker->paragraph
    ];
});
