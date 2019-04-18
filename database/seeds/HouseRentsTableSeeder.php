<?php

use Database\factories\HouseRentsFactory;
use Illuminate\Database\Seeder;

class HouseRentsTableSeeder extends Seeder
{
  protected $table = 'house_rents';

  protected $file = 'houseRents';

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    (new HouseRentsFactory($this->table, $this->file, 'original'))->create();
  }
}
