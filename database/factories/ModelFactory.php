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
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1,2),
        'category_id' => $faker->numberBetween(1,4),
        'photo_id' => $faker->numberBetween(1,7),
        'title' => $faker->sentence(6, true),
        'body' => $faker->paragraphs($nb = 3, $asText = true),

    ];

});
