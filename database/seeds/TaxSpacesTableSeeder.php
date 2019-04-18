<?php

use Database\factories\SpaceChildFactory;
use Illuminate\Database\Seeder;

class TaxSpacesTableSeeder extends Seeder
{
  protected $table = 'tax_spaces';

  protected $file = 'taxSpaces';

  protected $tile = 'tax';

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
