<?php

use Illuminate\Database\Seeder;
use Database\factories\CardChildFactory;

class AdvanceStreetCardsTableSeeder extends Seeder
{
    protected $table = 'advance_street_cards';

    protected $file = 'advanceStreetCards';

    protected $action = 'advance_street';

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
