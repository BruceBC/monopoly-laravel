<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $guarded = ['id'];

  /**
   * Get the game pieces for the game.
   *
   * @return HasMany
   */
  public function gamePieces()
  {
    return $this->hasMany(GamePiece::class);
  }

  /**
   * Get the spaces for the game.
   *
   * @return HasMany
   */
  public function spaces()
  {
    return $this->hasMany(Space::class);
  }

  /**
   * Get the cards for the game.
   *
   * @return HasMany
   */
  public function cards()
  {
    return $this->hasMany(Card::class);
  }
}
