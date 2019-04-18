<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PayPerPlayerCard extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['amount'];

  /**
   * Get the card that owns the pay per player card.
   *
   * @return BelongsTo
   */
  public function card()
  {
    return $this->belongsTo(Card::class);
  }
}
