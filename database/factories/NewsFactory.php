<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\News::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $content = $faker->realText(rand(1000, 4000));
    $isPublished = rand(0, 1);
    $views = $isPublished ? rand(0, 6) : 0;
    $created_at = $faker->dateTimeBetween('-3 months');
    $interval = $faker->dateTimeBetween('-3 months', '-1 days');
    $updated_at = $created_at < $interval ? $interval : $created_at;
    $published_at = ($isPublished) ? $updated_at : null;


    return [
        'title' => $title,
        'content' => $content,
        'is_published' => $isPublished,
        'created_at' => $created_at,
        'published_at' => $published_at,
        'updated_at' => $updated_at,
        'views' => $views,
    ];
});
