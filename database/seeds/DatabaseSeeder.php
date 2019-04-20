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
            // Games
            GameTableSeeder::class,
            GamePiecesTableSeeder::class,

            // Spaces
            SpacesTableSeeder::class,
            GoSpacesTableSeeder::class,
            JailSpacesTableSeeder::class,
            ParkingSpacesTableSeeder::class,
            TaxSpacesTableSeeder::class,

            // Cards
            CardsTableSeeder::class,
            PaymentCardsTableSeeder::class,
            CollectionCardsTableSeeder::class,
            RepairCardsTableSeeder::class,
            RetreatCardsTableSeeder::class,
            PayPerPlayerCardsTableSeeder::class,
            CollectPerPlayerCardsTableSeeder::class,
            AdvanceGoCardsTableSeeder::class,
            AdvanceStreetCardsTableSeeder::class,
            AdvanceRailroadCardsTableSeeder::class,
            AdvanceUtilityCardsTableSeeder::class,

            // Deeds
            DeedsTableSeeder::class,
            StreetDeedsTableSeeder::class,
            RailroadDeedsTableSeeder::class,
            UtilityDeedsTableSeeder::class,

            // House Rents
            HouseRentsTableSeeder::class,
        ]);
    }
}
