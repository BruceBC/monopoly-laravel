<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingSpace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['reward'];

    /**
     * Get the space that owns the parking space.
     *
     * @return BelongsTo
     */
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
