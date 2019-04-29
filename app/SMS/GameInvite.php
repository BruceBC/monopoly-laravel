<?php

namespace App\SMS;

use Twilio;
use App\Session;
use App\User;
use Illuminate\Queue\SerializesModels;

class GameInvite
{
    use SerializesModels;

    public $user;

    public $session;

    public $phoneNumbers;

    public $playerNames;

    public $link;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Session $session
     * @param array $phoneNumbers
     */
    public function __construct(
        User $user,
        Session $session,
        array $phoneNumbers
    ) {
        $this->user = $user;

        $this->session = $session;

        $this->phoneNumbers = $phoneNumbers;

        $this->playerNames = $this->session->players
            ->reject(function ($player) {
                return $player->user_id == $this->user->id;
            })
            ->map(function ($player) {
                return $player->user->name;
            })
            ->values();

        $this->link = config('app.url') . "/sessions/{$this->session->code}";
    }

    /**
     * Send the message.
     *
     * @return $this
     */
    public function send()
    {
        collect($this->phoneNumbers)->each(function ($number) {
            Twilio::message($number, $this->message());
        });

        return $this;
    }

    /**
     * Builds a message.
     *
     * @return string
     */
    private function message()
    {
        $message = "{$this->user->name} invited you to play a game of Monopoly.\n\nInvites\n\n";

        $partials = $this->playerNames
            ->map(function ($name, $i) use ($message) {
                $break = $i < $this->playerNames->count() - 1 ? "\n\n" : '';

                return "{$name}{$break}";
            })
            ->implode('');

        return $message . $partials . "\n\nAccept Invite --> {$this->link}";
    }
}
