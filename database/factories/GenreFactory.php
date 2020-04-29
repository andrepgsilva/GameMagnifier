<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Genre;
use Faker\Generator as Faker;

$factory->define(Genre::class, function (Faker $faker) {
    $genres = [
        'Platform',
        'Shooter',
        'Fighting',
        'Beat\'em up',
        'Survival',
        'Action RPG',
        'MMORPG',
        'Stategy',
        'Metroidvania',
        'Adventure',
        'Sci-fi',
        'Racing',
        'Trivia',
    ];

    $genreIndex = rand(0, count($genres) - 1);

    return [
        'name' => $genres[$genreIndex]
    ];
});
