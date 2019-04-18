<?php

namespace Database\factories;

use App\Game;
use App\Space;
use Database\traits\Definable;
use Database\traits\Insertable;

class SpaceChildFactory
{
  use Insertable, Definable;

  protected $table;

  protected $file;

  protected $brand;

  protected $tile;

  public function __construct($table, $file, $brand, $tile)
  {
    $this->table = $table;
    $this->file = $file;
    $this->brand = $brand;
    $this->tile = $tile;
  }

  public function create()
  {
    $data = $this->definition($this->file);

    $gameId = Game::where('brand', $this->brand)->first()->id;

    $spaces = Space::where('game_id', $gameId)
      ->where('tile', $this->tile)
      ->get();

    $collection = collect($spaces)->map(function ($space) use ($data) {
      return array_merge($data[$this->brand][$space->name], [
        'space_id' => $space->id,
      ]);
    });

    $this->insert($this->table, $collection->toArray());

    return $this;
  }
}
