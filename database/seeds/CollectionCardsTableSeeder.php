<?php

use Database\childFactories\CardChildFactory;
use Illuminate\Database\Seeder;

class CollectionCardsTableSeeder extends Seeder
{
    protected $table = 'collection_cards';

    protected $file = 'collectionCards';

    protected $action = 'collect';

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
