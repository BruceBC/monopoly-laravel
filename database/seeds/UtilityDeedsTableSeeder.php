<?php

use Illuminate\Database\Seeder;
use Database\childFactories\DeedChildFactory;

class UtilityDeedsTableSeeder extends Seeder
{
    protected $table = 'utility_deeds';

    protected $file = 'utilityDeeds';

    protected $deedType = 'utility';

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
