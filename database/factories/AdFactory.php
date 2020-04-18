<?php

use Faker\Generator as Faker;

$factory->define(App\Ad::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->paragraph(),
        'date' => $faker->date(),
        'active' => $faker->boolean(),
    ];
});
