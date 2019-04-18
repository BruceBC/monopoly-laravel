<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseRent extends Model
{
  /**
   * Get the street deed that owns the house rent.
   *
   * @return BelongsTo
   */
  public function streetDeed()
  {
    return $this->belongsTo(StreetDeed::class);
  }
}
