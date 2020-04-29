<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Platform;
use Faker\Generator as Faker;

$factory->define(Platform::class, function (Faker $faker) {
    $platforms = [
        'Playstation 1',
        'Playstation 2',
        'Playstation 3',
        'Playstation 4',
        'Xbox 360',
        'Xbox One',
        'Nintendo',
        'Super Nintendo',
        'Nintendo 64',
        'Nintendo Wii',
        'Nintendo 2ds',
        'Nintendo 3ds',
        'Nintendo Switch',
        'PC',
        'Mobile',
    ];

    $platformIndex = rand(0, count($platforms) - 1);

    return [
        'name' => $platforms[$platformIndex]
    ];
});
