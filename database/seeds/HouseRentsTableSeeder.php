<?php

use Illuminate\Database\Seeder;
use Database\factories\HouseRentsFactory;

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
