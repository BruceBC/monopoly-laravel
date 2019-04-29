<?php

namespace App\Events;

use App\Session;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class GameCreated
{
    use Dispatchable, SerializesModels;

    public $user;

    public $session;

    public $emails;

    public $phoneNumbers;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Session $session
     * @param array $emails
     * @param array $phoneNumbers
     */
    public function __construct(
        User $user,
        Session $session,
        array $emails,
        array $phoneNumbers
    ) {
        $this->user = $user;

        $this->session = $session;

        $this->emails = $emails;

        $this->phoneNumbers = $phoneNumbers;
    }
}
