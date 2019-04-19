<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StreetDeed extends Model
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

    /**
     * Get the house rent for the street deed.
     *
     * @return HasOne
     */
    public function houseRent()
    {
        return $this->hasOne(HouseRent::class);
    }
}
