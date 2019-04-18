<?php

use Database\factories\CardChildFactory;
use Illuminate\Database\Seeder;

class RepairCardsTableSeeder extends Seeder
{
  protected $table = 'repair_cards';

  protected $file = 'repairCards';

  protected $action = 'repair';

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
