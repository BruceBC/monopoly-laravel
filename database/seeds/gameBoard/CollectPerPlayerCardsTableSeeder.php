<?php

use Illuminate\Database\Seeder;
use Database\childFactories\CardChildFactory;

class CollectPerPlayerCardsTableSeeder extends Seeder
{
    protected $table = 'collect_per_player_cards';

    protected $file = 'collectPerPlayerCards';

    protected $action = 'collect_per_player';

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
