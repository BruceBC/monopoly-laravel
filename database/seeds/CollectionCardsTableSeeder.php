<?php

use Illuminate\Database\Seeder;
use Database\factories\CardChildFactory;

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
