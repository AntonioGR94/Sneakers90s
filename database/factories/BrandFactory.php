<?php

use Faker\Generator as Faker;
use App\Brand;

$factory->define(App\Brand::class, function (Faker $faker) {
  $name = $faker->company();

    return [
      'name'        => $name,
      'description'   => $faker->text(500),
      'owner'   => $faker->firstNameMale(),
      'slug'        => str_slug($name),
      'url'         => $faker->domainName(),
      'createDate'  => $faker->date($format = 'Y-m-d')

    ];
});
