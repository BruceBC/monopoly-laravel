<?php

namespace Tests\Feature;

use App\Game;
use DatabaseSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    protected $game;

    protected function setUp(): void
    {
        parent::setUp();

        // Remember to comment out "Artisan::call('migrate:refresh');" before running tests.
        $this->seed(DatabaseSeeder::class);
    }

    /** @test */
    public function it_matches_game_count()
    {
        $count = Game::all()->count();

        $this->assertEquals(3, $count);
    }

    /** @test */
    public function it_matches_game_pieces_count()
    {
        $count = Game::where('brand', 'original')
            ->first()
            ->gamePieces->count();

        $this->assertEquals(8, $count);
    }

    /** @test */
    public function it_matches_spaces_count()
    {
        $count = Game::where('brand', 'original')
            ->first()
            ->spaces->count();

        $this->assertEquals(40, $count);
    }

    /** @test */
    public function it_matches_cards_count()
    {
        $count = Game::where('brand', 'original')
            ->first()
            ->cards->count();

        $this->assertEquals(32, $count);
    }
}
