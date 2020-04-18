<?php

use Faker\Generator as Faker;

$factory->define(App\Magazine::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'folder' => $faker->name(),
        'number' => $faker->name(),
    ];
});
