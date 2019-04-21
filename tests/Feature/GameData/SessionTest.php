<?php

namespace Tests\Feature\GameData;

use App\Game;
use App\Player;
use App\Session;
use App\User;
use DatabaseSeeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait Gameable
{
    // Need to be set before using
    protected $migrations;

    protected $connection;

    protected $brand;

    // Set as methods are called
    protected $game;

    protected $users;

    protected $session;

    protected $players;

    public function createGameBoard()
    {
        // Create Game Board
        $this->seed(DatabaseSeeder::class);

        $this->game = Game::on($this->connection)
            ->where('brand', $this->brand)
            ->first();
    }

    public function createUsers($count = 6)
    {
        $this->users = factory(User::class, $count)
            ->connection($this->connection)
            ->create();
    }

    public function createSession()
    {
        $this->session = factory(Session::class)
            ->connection($this->connection)
            ->create();

        $count = Session::on($this->connection)->count();

        // Ensure session has been created
        $this->assertNotEmpty($this->session->id);
        $this->assertNotEmpty($this->session->code);
        $this->assertEquals('active', $this->session->status);
        $this->assertEquals(1, $count);
    }

    public function sendPlayerInvites($count = 6)
    {
        // TODO: Assign cards and deeds to users

        $go = $this->game->spaces->where('tile', 'go')->first();

        // Simulate sending player invites
        $this->players = factory(Player::class, 6)
            ->connection($this->connection)
            ->make([
                'space_id' => $go->id,
                'cash' => $this->game->cash,
            ]);

        // Assign users to players
        $this->users->each(function ($user, $i) {
            $user->players()->save($this->players[$i]);
        });
    }

    public function playersAcceptInvite()
    {
        // Players accept invite and are added to session
        $this->session->players()->saveMany($this->players);

        // Players are now marked as active for joining session
        $this->players->each(function ($player) {
            $player->active = true;
            $player->save();
        });

        // Find active players
        $activePlayers = $this->players->filter(function ($player) {
            return $player->active;
        });

        // 6 players should have joined the session and are active
        $this->assertEquals(6, $activePlayers->count());

        // Player should have access to a session
        $this->assertNotNull(Player::on($this->connection)->find(1)->session);
    }
}

abstract class GameBase extends TestCase
{
    use Gameable, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->migrations = 'database/gameData/migrations/';

        $this->connection = 'mysql_game_data';

        $this->brand = 'original';

        $this->createGameBoard();

        // Not sure why I all of a sudden need this now (need to figure out this multiple db thing with tests)
        Artisan::call('migrate', [
            '--database' => $this->connection,
            '--path' => $this->migrations,
        ]);

        $this->createUsers();
    }

    // https://laracasts.com/discuss/channels/testing/refreshdatabase-migration-path
    public function artisan($command, $parameters = [])
    {
        if (
            Str::before($command, ':') === 'migrate' &&
            !isset($parameters['--path'])
        ) {
            $parameters['--path'] = $this->migrations;
        }

        return parent::artisan($command, $parameters);
    }
}

class SessionTest extends GameBase
{
    /** @test */
    public function it_succeeds_to_create_a_session()
    {
        // We assume game board and 6 users already exist

        $this->createSession();

        $this->sendPlayerInvites();

        $this->playersAcceptInvite();

        // More Steps (not necessarily in this method)

        // TODO: Simulate players rolling to figure out who's turn it is

        // TODO: Assign player order and turn according to highest roll

        // TODO: Assign cards and deeds to players (as they progress)

        // TODO: Simulate players moving

        // TODO: Write rules for what happens when a user lands on a space (did they pass go?)

        // TODO: Assign next player's turn in the queue and deactivate current player's turn

        // TODO: Simulate user getting jailed

        // TODO: Simulate user rolling doubles (1, 2, 3)

        // TODO: Stub out Controller methods and api routes and test in postman/integration

        // TODO: Send emails/sms invites to players

        // TODO: Broadcast events to players
        // player rolled, player moved, player bought a property,
        // player drew a card, player went to jail or advanced to go,
        // player starts bidding war, player wants to trade,
        // update player's turn, player loses game, player wins game

        // TODO: Authenticate players per session

        // TODO: Fix tests to use testing database, rather than game_data
    }
}
