<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RetreatCard extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['move'];

  /**
   * Get the card that owns the retreat card.
   *
   * @return BelongsTo
   */
  public function card()
  {
    return $this->belongsTo(Card::class);
  }
}
