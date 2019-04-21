<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Session;

$factory->define(Session::class, function () {
    return [
        'status' => 'active',
    ];
});
