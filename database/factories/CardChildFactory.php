<?php

namespace Database\factories;

use App\Game;
use App\Card;
use Database\traits\Definable;
use Database\traits\Insertable;

class CardChildFactory
{
  use Insertable, Definable;

  protected $table;

  protected $file;

  protected $brand;

  protected $action;

  public function __construct($table, $file, $brand, $action)
  {
    $this->table = $table;
    $this->file = $file;
    $this->brand = $brand;
    $this->action = $action;
  }

  public function create()
  {
    $data = $this->definition($this->file);

    $gameId = Game::where('brand', $this->brand)->first()->id;

    $cards = Card::where('game_id', $gameId)
      ->where('action', $this->action)
      ->get();

    $collection = collect($cards)->map(function ($card) use ($data) {
      return array_merge($data[$this->brand][$card->tag], [
        'card_id' => $card->id,
      ]);
    });

    $this->insert($this->table, $collection->toArray());

    return $this;
  }
}
