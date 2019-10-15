<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'content' => $faker->paragraph
    ];
});
