<?php

use Faker\Generator as Faker;

$factory->define(App\Paper::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->paragraph(),
        'type' => $faker->numberBetween(1, 5),
        'published_at' => $faker->boolean(),
        'publish_place' => $faker->boolean(),
        'pages' => $faker->randomDigitNotNull(),
        'references' => $faker->randomDigitNotNull(),
        'college_id' => function () {
            return factory(App\College::class)->create()->id;
        },
        'department_id' => function () {
            return factory(App\Department::class)->create()->id;
        },
        'magazine_id' => function () {
            return factory(App\Magazine::class)->create()->id;
        },
        'conference_id' => function () {
            return factory(App\Conference::class)->create()->id;
        },
    ];
});