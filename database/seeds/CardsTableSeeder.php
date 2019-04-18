<?php

use App\Card;
use Database\traits\Definable;
use Database\traits\Insertable;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
  use Insertable, Definable;

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $cards = $this->definition('cards');

    $originalCards = collect($cards['original'])->map(function ($card) {
      return factory(Card::class)
        ->states('original')
        ->make($card);
    });

    $this->insert('cards', $originalCards->toArray());
  }
}
