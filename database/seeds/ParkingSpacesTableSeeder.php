<?php

use Database\childFactories\SpaceChildFactory;
use Illuminate\Database\Seeder;

class ParkingSpacesTableSeeder extends Seeder
{
    protected $table = 'parking_spaces';

    protected $file = 'parkingSpaces';

    protected $tile = 'parking';

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
