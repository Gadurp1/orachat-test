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
        'name' => $faker->name,
        'created' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    $users = \App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'message' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'created' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
    ];
});
