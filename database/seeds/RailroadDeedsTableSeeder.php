<?php

use Database\childFactories\DeedChildFactory;
use Illuminate\Database\Seeder;

class RailroadDeedsTableSeeder extends Seeder
{
    protected $table = 'railroad_deeds';

    protected $file = 'railroadDeeds';

    protected $deedType = 'railroad';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new DeedChildFactory(
      $this->table,
      $this->file,
      'original',
      $this->deedType
    ))->create();
    }
}
