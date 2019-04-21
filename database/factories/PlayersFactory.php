<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function () {
    return [
        'user_id' => '',
        'session_id' => '',
        'space_id' => '',
        'cash' => '',
        'active' => false,
        'turn' => false,
        'jailed' => false,
        'double_roll_count' => 0,
        'order' => 0,
    ];
});
