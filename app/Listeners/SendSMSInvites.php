<?php

namespace App\Listeners;

use App\Events\GameCreated;
use App\SMS\GameInvite;

class SendSMSInvites
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GameCreated  $event
     * @return void
     */
    public function handle(GameCreated $event)
    {
        if (count($event->phoneNumbers) > 0) {
            (new GameInvite(
                $event->user,
                $event->session,
                $event->phoneNumbers
            ))->send();
        }
    }
}
