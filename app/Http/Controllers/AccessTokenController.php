<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessTokenController extends Controller
{
    public function store(Request $request)
    {
        // Get authenticated user
        $user = Auth::user();

        // Get previous tokens
        $tokens = $user->tokens;

        // TODO: Move to scheduler that removes old tokens nightly
        // Only allow for 5 tokens to be present at any given time
        if ($tokens->count() > 4) {
            // Clear out old tokens
            $timestamp = $tokens
                ->reverse()
                ->take($tokens->count() - 4)
                ->last()->created_at;

            $user
                ->tokens()
                ->where('created_at', '<=', $timestamp)
                ->delete();
        }

        // Create and return new token
        return $user->createToken('monopoly');
    }
}
