<?php

use Database\childFactories\CardChildFactory;
use Illuminate\Database\Seeder;

class PayPerPlayerCardsTableSeeder extends Seeder
{
    protected $table = 'pay_per_player_cards';

    protected $file = 'payPerPlayerCards';

    protected $action = 'pay_per_player';

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
