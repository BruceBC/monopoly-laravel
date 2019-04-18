<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvanceRailroadCard extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['factor'];

  /**
   * Get the card that owns the advance railroad card.
   *
   * @return BelongsTo
   */
  public function card()
  {
    return $this->belongsTo(Card::class);
  }
}
