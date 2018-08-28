<?php

use App\Convert;
use Faker\Generator as Faker;
use Romans\Filter\IntToRoman;

$factory->define(Convert::class, function (Faker $faker) {
    $intToRoman = new IntToRoman();
    $int = $faker->numberBetween(1,3999);
    return [
        'integer'=> $int,
        'converted' => $intToRoman->filter($int)
    ];
});
