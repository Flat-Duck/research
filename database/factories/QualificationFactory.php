<?php

use Faker\Generator as Faker;

$factory->define(App\Qualification::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
