<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Space extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'tile'];

  /**
   * Get the game that owns the spaces.
   *
   * @return BelongsTo
   */
  public function game()
  {
    return $this->belongsTo(Game::class);
  }

  /**
   * Get the go space for the game.
   *
   * @return HasOne
   */
  public function goSpace()
  {
    return $this->hasOne(GoSpace::class);
  }

  /**
   * Get the jail space for the game.
   *
   * @return HasOne
   */
  public function jailSpace()
  {
    return $this->hasOne(JailSpace::class);
  }

  /**
   * Get the parking space for the game.
   *
   * @return HasOne
   */
  public function parkingSpace()
  {
    return $this->hasOne(ParkingSpace::class);
  }

  /**
   * Get the tax spaces for the game.
   *
   * @return HasMany
   */
  public function taxSpaces()
  {
    return $this->hasMany(TaxSpace::class);
  }
}
