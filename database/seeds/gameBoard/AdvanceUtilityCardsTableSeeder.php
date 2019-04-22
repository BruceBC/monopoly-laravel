<?php

use Illuminate\Database\Seeder;
use Database\childFactories\CardChildFactory;

class AdvanceUtilityCardsTableSeeder extends Seeder
{
    protected $table = 'advance_go_cards';

    protected $file = 'advanceGoCards';

    protected $action = 'advance_go';

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
