<?php

use Database\traits\Definable;
use Database\traits\Insertable;
use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    use Insertable, Definable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = $this->definition('games');

        $this->insert('games', [
      $games['original'],

      $games['jurassic'],

      $games['empire'],
    ]);
    }
}
