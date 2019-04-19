<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepairCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['house_charge', 'hotel_charge'];

    /**
     * Get the card that owns the repair card.
     *
     * @return BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
