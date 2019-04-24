<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;

class BroadcastAuthController extends Controller
{
    /**
     * Authenticate
     * @param Request $request
     * @return string
     */
    public function auth(Request $request)
    {
        return Broadcast::auth($request);
    }
}
