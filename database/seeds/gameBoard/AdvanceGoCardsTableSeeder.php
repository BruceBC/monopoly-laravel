<?php

use Illuminate\Database\Seeder;
use Database\childFactories\CardChildFactory;

class AdvanceGoCardsTableSeeder extends Seeder
{
    protected $table = 'advance_utility_cards';

    protected $file = 'advanceUtilityCards';

    protected $action = 'advance_utility';

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
