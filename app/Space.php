<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Space extends Model
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
    protected $fillable = ['name', 'tile'];

    /**
     * Get the game that owns the spaces.
     *
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Get the go space for the game.
     *
     * @return HasOne
     */
    public function goSpace()
    {
        return $this->hasOne(GoSpace::class);
    }

    /**
     * Get the jail space for the game.
     *
     * @return HasOne
     */
    public function jailSpace()
    {
        return $this->hasOne(JailSpace::class);
    }

    /**
     * Get the parking space for the game.
     *
     * @return HasOne
     */
    public function parkingSpace()
    {
        return $this->hasOne(ParkingSpace::class);
    }

    /**
     * Get the tax space for the game.
     *
     * @return HasOne
     */
    public function taxSpace()
    {
        return $this->hasOne(TaxSpace::class);
    }

    /**
     * Get the deed space for the game.
     *
     * @return HasOne
     */
    public function deedSpace()
    {
        return $this->hasOne(Deed::class);
    }
}
