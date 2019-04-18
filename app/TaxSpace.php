<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxSpace extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['fee'];

  /**
   * Get the space that owns the tax space.
   *
   * @return BelongsTo
   */
  public function space()
  {
    return $this->belongsTo(Space::class);
  }
}
