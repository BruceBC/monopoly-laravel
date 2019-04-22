<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JailSpace extends Model
{
    /**
     * Database connection.
     *
     * @var string
     */
    protected $connection = 'mysql_game_board';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rolls', 'early_fee', 'late_fee'];

    /**
     * Get the space that owns the jail space.
     *
     * @return BelongsTo
     */
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
