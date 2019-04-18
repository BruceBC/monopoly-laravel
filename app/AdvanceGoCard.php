<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvanceGoCard extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['collect'];

  /**
   * Get the card that owns the advance go card.
   *
   * @return BelongsTo
   */
  public function card()
  {
    return $this->belongsTo(Card::class);
  }
}
