<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class Session extends Model
{
    protected $connection = 'mysql_game_data';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->code = (string) Uuid::uuid4();
        });
    }

    /**
     * Get the players for the session.
     *
     * @return HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
