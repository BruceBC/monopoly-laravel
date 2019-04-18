<?php

use Database\factories\SpaceChildFactory;
use Illuminate\Database\Seeder;

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
