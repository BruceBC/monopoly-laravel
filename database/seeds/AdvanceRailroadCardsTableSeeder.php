<?php

use Database\factories\CardChildFactory;
use Illuminate\Database\Seeder;

class AdvanceRailroadCardsTableSeeder extends Seeder
{
  protected $table = 'advance_railroad_cards';

  protected $file = 'advanceRailroadCards';

  protected $action = 'advance_railroad';

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    (new CardChildFactory(
      $this->table,
      $this->file,
      'original',
      $this->action
    ))->create();
  }
}
