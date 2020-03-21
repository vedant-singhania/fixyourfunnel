<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Faker\Provider\Lorem;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'user_id' => $faker->numberBetween(1,30),
        'post_id' => $faker->numberBetween(1,30),
    ];
});
