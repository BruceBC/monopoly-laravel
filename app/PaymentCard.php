<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentCard extends Model
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
    protected $fillable = ['fee'];

    /**
     * Get the card that owns the payment card.
     *
     * @return BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
