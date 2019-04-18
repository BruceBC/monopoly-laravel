<?php

use App\Space;
use Database\traits\Definable;
use Database\traits\Insertable;
use Illuminate\Database\Seeder;

class SpacesTableSeeder extends Seeder
{
  use Insertable, Definable;

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $spaces = $this->definition('spaces');

    $originalSpaces = collect($spaces['original'])->map(function ($space) {
      return factory(Space::class)
        ->states('original')
        ->make($space);
    });

    $this->insert('spaces', $originalSpaces->toArray());
  }
}
