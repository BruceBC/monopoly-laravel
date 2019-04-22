<?php

use Illuminate\Database\Seeder;
use Database\childFactories\CardChildFactory;

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
