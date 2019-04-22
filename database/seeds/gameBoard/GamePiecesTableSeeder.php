<?php

use App\GamePiece;
use Database\traits\Definable;
use Database\traits\Insertable;
use Illuminate\Database\Seeder;

class GamePiecesTableSeeder extends Seeder
{
    use Insertable, Definable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = $this->definition('gamePieces');

        $originalGamePieces = collect($names['original'])->map(function ($name) {
            return factory(GamePiece::class)
        ->states('original')
        ->make(['name' => $name]);
        });

        $this->insert('game_pieces', $originalGamePieces->toArray());
    }
}
