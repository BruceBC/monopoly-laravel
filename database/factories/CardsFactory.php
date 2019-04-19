<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Card;
use App\Game;

/*
 * Definitions
 */
$factory->define(Card::class, function () {
    return [
    'rule'   => '',
    'action' => '',
    'type'   => '',
    'tag'    => '',
  ];
});

/*
 * States
 */
$factory->state(Card::class, 'original', function () {
    return [
    'game_id' => Game::where('brand', 'original')->first()->id,
  ];
});
