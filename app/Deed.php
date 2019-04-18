<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deed extends Model
{
  /**
   * Get the space that owns the deeds.
   *
   * @return BelongsTo
   */
  public function space()
  {
    return $this->belongsTo(Space::class);
  }

  /**
   * Get the street deed for the deed.
   *
   * @return HasOne
   */
  public function streetDeed()
  {
    return $this->hasOne(StreetDeed::class);
  }

  /**
   * Get the railroad deed for the deed.
   *
   * @return HasOne
   */
  public function railroadDeed()
  {
    return $this->hasOne(RailroadDeed::class);
  }

  /**
   * Get the utility deed for the deed.
   *
   * @return HasOne
   */
  public function utilityDeed()
  {
    return $this->hasOne(UtilityDeed::class);
  }
}
