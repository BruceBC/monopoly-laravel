<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoSpace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['passing_price', 'landing_space'];

    /**
     * Get the space that owns the go space.
     *
     * @return BelongsTo
     */
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
