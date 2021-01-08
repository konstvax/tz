<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\News::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $content = $faker->realText(rand(1000, 4000));
    $isPublished = rand(0, 1);
    $created_at = $isPublished ? $faker->dateTimeBetween('-1 months', '-1 days') : null;


    return [
        'title' => $title,
        'content' => $content,
        'is_published' => $isPublished,
        'published_at' => $created_at,
        'updated_at' => $created_at,
    ];
});
