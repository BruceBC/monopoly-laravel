<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GamePiece extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the game that owns the game pieces.
     *
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
