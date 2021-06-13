<?php

// namespace Database\Factories;

use Faker\Generate as Faker;
// use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(App\Project::class, function (Faker $faker){
    return [
        'title'=>$faker->sentence,
        'description'=>$faker->paragraph
    ];
});