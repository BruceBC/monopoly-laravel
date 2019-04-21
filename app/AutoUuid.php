<?php

namespace App;

use Ramsey\Uuid\Uuid;

trait AutoUuid
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = (string) Uuid::uuid4();
        });
    }
}
