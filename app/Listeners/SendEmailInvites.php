<?php

namespace App\Listeners;

use App\Events\GameCreated;
use App\Mail\GameInvite;
use Illuminate\Support\Facades\Mail;

class SendEmailInvites
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
     * @param GameCreated $event
     * @return void
     */
    public function handle(GameCreated $event)
    {
        if (count($event->emails) > 0) {
            Mail::to($event->emails)->queue(
                new GameInvite($event->user, $event->session)
            );
        }
    }
}
