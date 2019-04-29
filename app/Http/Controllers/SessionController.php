<?php

namespace App\Http\Controllers;

use App\Events\GameCreated;
use App\Events\SendInvites;
use App\Events\SessionCreated;
use App\Http\Resources\SessionResource;
use App\Player;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $user = Auth::user();

        $sessions = $user->players->map(function ($player) {
            return $player->session;
        });

        return SessionResource::collection($sessions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create session
        // Send out invites
        // Broadcast as users are added to the lobby

        $user = Auth::user();

        $session = Session::create();

        // Filter out any invites that do not match any records in the database
        $invites = collect($request->input('invites'));
        $invites = $invites
            ->reject(function ($contact) {
                $user = User::where('email', $contact)
                    ->orWhere('phone', $contact)
                    ->first();

                return $user == null || $user->id == Auth::user()->id;
            })
            ->map(function ($contact) {
                $user = User::where('email', $contact)
                    ->orWhere('phone', $contact)
                    ->first();

                return [
                    'email' => $user->email, // For uniqueness
                    'contact_method' => $contact,
                ];
            })
            ->unique('email')
            ->map(function ($invite) {
                return $invite['contact_method'];
            })
            ->values();

        //        $host = new Player([
        //            'session_id' => $session->id,
        //            'space_id' => 0, // TODO: Get from gameboard
        //            'cash' => 1500, // TODO: Get from gameboard
        //            'active' => true,
        //        ]);
        //
        //        $users = $invites
        //            ->map(function ($contact) {
        //                return User::where('email', $contact)
        //                    ->orWhere('phone', $contact)
        //                    ->first();
        //            })
        //            ->filter()
        //            ->unique();
        //
        //        $user->players()->save($host);
        //
        //        $users->each(function ($user) use ($session) {
        //            $user->players()->save(
        //                new Player([
        //                    'session_id' => $session->id,
        //                    'space_id' => 0, // TODO: Get from gameboard
        //                    'cash' => 1500, // TODO: Get from gameboard
        //                ])
        //            );
        //        });

        // Collect Emails
        $emails = $invites
            ->reject(function ($invite) {
                return !Str::contains($invite, '@');
            })
            ->values()
            ->toArray();

        $phoneNumbers = $invites
            ->reject(function ($invite) {
                return Str::contains($invite, '@');
            })
            ->values()
            ->toArray();

        // Broadcast Session

        broadcast(new SessionCreated($session));

        // Send Invites
        $inviter = User::find($user->id);

        event(new GameCreated($inviter, $session, $emails, $phoneNumbers));

        return $session;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
