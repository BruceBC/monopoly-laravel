<?php

use Database\childFactories\SpaceChildFactory;
use Illuminate\Database\Seeder;

class GoSpacesTableSeeder extends Seeder
{
    protected $table = 'go_spaces';

    protected $file = 'goSpaces';

    protected $tile = 'go';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new SpaceChildFactory(
      $this->table,
      $this->file,
      'original',
      $this->tile
    ))->create();
    }
}
