<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseRent extends Model
{
    /**
     * Database connection.
     *
     * @var string
     */
    protected $connection = 'mysql_game_board';

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
