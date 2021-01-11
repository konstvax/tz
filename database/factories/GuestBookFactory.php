<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Guestbook;
use Faker\Generator as Faker;

$factory->define(Guestbook::class, function (Faker $faker) {
    $user_name = $faker->name();
    $email = $faker->unique()->safeEmail;
    $text = $faker->realText(rand(10, 1000));
    $isPublished = rand(0, 1);
    $created_at = $faker->dateTimeBetween('-3 months');
    $interval = $faker->dateTimeBetween('-3 months', '-1 days');
    $updated_at = $created_at < $interval ? $interval : $created_at;

    return [
        'username' => $user_name,
        'email' => $email,
        'text' => $text,
        'is_published' => $isPublished,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
