<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RailroadDeed extends Model
{
    /**
     * Database connection.
     *
     * @var string
     */
    protected $connection = 'mysql_game_board';

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
