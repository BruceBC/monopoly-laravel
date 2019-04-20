<?php

use Database\childFactories\CardChildFactory;
use Illuminate\Database\Seeder;

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
