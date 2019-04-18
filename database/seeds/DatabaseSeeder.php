<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // Clear database

    Artisan::call('migrate:refresh');

    $this->call([
      GameTableSeeder::class,
      GamePiecesTableSeeder::class,
      SpacesTableSeeder::class,
      GoSpacesTableSeeder::class,
      JailSpacesTableSeeder::class,
      ParkingSpacesTableSeeder::class,
      TaxSpacesTableSeeder::class,
      CardsTableSeeder::class,
      PaymentCardsTableSeeder::class,
      CollectionCardsTableSeeder::class,
      RepairCardsTableSeeder::class,
      RetreatCardsTableSeeder::class,
      PayPerPlayerCardsTableSeeder::class,
      CollectPerPlayerCardsTableSeeder::class,
    ]);
  }
}
