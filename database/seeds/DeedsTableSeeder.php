<?php

use Database\factories\SpaceChildFactory;
use Illuminate\Database\Seeder;

class DeedsTableSeeder extends Seeder
{
  protected $table = 'deeds';

  protected $file = 'deeds';

  protected $tile = 'deed';

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
