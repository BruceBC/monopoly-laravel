<?php

use Illuminate\Database\Seeder;
use Database\childFactories\SpaceChildFactory;

class JailSpacesTableSeeder extends Seeder
{
    protected $table = 'jail_spaces';

    protected $file = 'jailSpaces';

    protected $tile = 'jail';

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
