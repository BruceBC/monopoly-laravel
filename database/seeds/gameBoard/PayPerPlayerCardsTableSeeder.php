<?php

use Illuminate\Database\Seeder;
use Database\childFactories\CardChildFactory;

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
