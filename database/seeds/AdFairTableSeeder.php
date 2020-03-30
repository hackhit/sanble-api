<?php

use Illuminate\Database\Seeder;

use App\Fair;
use App\AdFair;

class AdFairTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fair = Fair::where("id", "=", "1")->first();

        $invitation = new AdFair();
        $invitation->title = "Morbi eget maximus lorem, et imperdiet risus";
        $invitation->description = "In convallis justo dolor, id efficitur dui pretium eget. Morbi nec ligula tortor. Sed hendrerit consectetur libero, id rhoncus turpis elementum vitae.";
        $invitation->fair_id = $fair->id;
        $invitation->save();
    }
}
