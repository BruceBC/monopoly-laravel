<?php

use Database\factories\DeedChildFactory;
use Illuminate\Database\Seeder;

class StreetDeedsTableSeeder extends Seeder
{
  protected $table = 'street_deeds';

  protected $file = 'streetDeeds';

  protected $deedType = 'street';

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
