<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Chat::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'chat_id' => App\Chat::first()->id,
        'user_id' => $faker->unique()->safeEmail,
        'message' => str_random(25),
        'remember_token' => str_random(10),
    ];
});
