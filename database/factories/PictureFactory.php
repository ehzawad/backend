<?php

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) {
    return [
        'picture' => $faker->image('public/images',400,300, null, false),
        'description' => $faker->text(200)
    ];
});
