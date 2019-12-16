<?php

use Faker\Generator as Faker;

$factory->define(App\Forum::class, function (Faker $faker) {
    //datos fictios
    //====== sentencia para crear la url amigable
    $name=$faker->sentence;
    return [
        //
        'name'=>$name,
        'description'=>$faker->paragraph,
        'slug'=>str_slug($name,'-'),
    ];
});
