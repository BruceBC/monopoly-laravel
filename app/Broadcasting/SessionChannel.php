<?php

namespace App\Broadcasting;

use App\Player;
use App\Session;
use App\User;

class SessionChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @param string $code
     * @return array|bool
     */
    public function join(User $user, string $code)
    {
        $session = Session::where('code', $code)->first();

        if (!isset($session)) {
            return false;
        }

        $player = $session->players->firstWhere('user_id', $user->id);

        if (!isset($player)) {
            return false;
        }

        if (
            $user->id == $player->user_id &&
            $session->id == $player->session_id
        ) {
            return [
                'name' => $user->name,
                'meta' => [
                    'count' => $session->players->count(),
                ],
            ];
        }
    }
}
