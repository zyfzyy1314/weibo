<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Statues;
use Faker\Generator as Faker;
use App\User;

$factory->define(Statues::class, function (Faker $faker) {

    $date_time = $faker->date . ' ' . $faker->time;

    return [
        'content'=>$faker->text(),
        'user_id'=>User::all()->random()->id,
       //'user_id'=>1,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
