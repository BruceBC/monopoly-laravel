<?php

namespace App\Mail;

use App\Session;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GameInvite extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $session;

    public $playerNames;

    public $link;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Session $session
     */
    public function __construct(User $user, Session $session)
    {
        $this->user = $user;

        $this->session = $session;

        $this->playerNames = $this->session->players
            ->reject(function ($player) {
                return $player->user_id == $this->user->id;
            })
            ->map(function ($player) {
                return $player->user->name;
            });

        $this->link = "/sessions/{$this->session->code}";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // TODO: Update from address
        return $this->from('invite@monopoly-online.com')
            ->subject("Game Invite From {$this->user->name}")
            ->markdown('emails.game-invite');
    }
}
