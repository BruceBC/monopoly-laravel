<?php

use Database\factories\CardChildFactory;
use Illuminate\Database\Seeder;

class RetreatCardsTableSeeder extends Seeder
{
  protected $table = 'retreat_cards';

  protected $file = 'retreatCards';

  protected $action = 'retreat';

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
