<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessTokenController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        return $user->createToken('monopoly');
    }
}
