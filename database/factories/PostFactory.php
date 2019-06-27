<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
	$title = $faker->sentence;
	$slug = str_slug($title);
    return [
        'title' => $title,
        'slug' => $slug,
        'body' => $faker->realText(),
        'user_id' => 1,
        'category_id' => rand(1,6),
        'created_at' => $faker->dateTimeThisYear, 
        'updated_at' => Carbon::now()
    ];
});
