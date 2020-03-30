<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FairTableSeeder::class);
        $this->call(InvitationTableSeeder::class);
        $this->call(PhotographyTableSeeder::class);
        $this->call(RequestTableSeeder::class);
        $this->call(StandTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(ReviewFairTableSeeder::class);
        $this->call(ReviewStandTableSeeder::class);
        $this->call(AdStandTableSeeder::class);
        $this->call(AdFairTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(PivotTableSeeder::class);
    }
}
