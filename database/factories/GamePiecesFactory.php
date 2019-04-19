<?php

/* @var $factory Factory */

use App\Game;
use App\GamePiece;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GamePiece::class, function () {
    return [
    'name' => '',
  ];
});

$factory->state(GamePiece::class, 'original', function () {
    return [
    'game_id' => Game::where('brand', 'original')->first()->id,
  ];
});

$factory->state(GamePiece::class, 'jurassic', function () {
    return [
    'game_id' => Game::where('brand', 'jurassic')->first()->id,
  ];
});

$factory->state(GamePiece::class, 'jurassic', function () {
    return [
    'game_id' => Game::where('brand', 'jurassic')->first()->id,
  ];
});
