<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'gender' => $faker->numberBetween(1, 5),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->safeEmail(),
        'qualification_id' => function () {
            return factory(App\Qualification::class)->create()->id;
        },
        'nationality_id' => function () {
            return factory(App\Nationality::class)->create()->id;
        },
        'college_id' => function () {
            return factory(App\College::class)->create()->id;
        },
        'department_id' => function () {
            return factory(App\Department::class)->create()->id;
        },
    ];
});
