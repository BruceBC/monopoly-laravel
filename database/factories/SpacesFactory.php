<?php

/* @var $factory Factory */

use App\Game;
use App\Space;
use Illuminate\Database\Eloquent\Factory;

/**
 * Definitions
 */
$factory->define(Space::class, function () {
  return [
    'name' => '',
    'tile' => '',
  ];
});

/**
 * States
 */
$factory->state(Space::class, 'original', function () {
  return [
    'game_id' => Game::where('brand', 'original')->first()->id,
  ];
});
