<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Currency;

$factory->define(Currency::class, function (Faker $faker) {
    return [
      'name' => 'JPY',
      'discount' => 0,
      'rate' => 0 
    ];
});
