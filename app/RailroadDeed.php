<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RailroadDeed extends Model
{
  /**
   * Get the deed that owns the street deed.
   *
   * @return BelongsTo
   */
  public function deed()
  {
    return $this->belongsTo(Deed::class);
  }
}
