<?php

use Illuminate\Database\Seeder;

use App\Stand;
use App\AdStand;

class AdStandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stand = Stand::where("id", "=", "1")->first();

        $invitation = new AdStand();
        $invitation->title = "Duis in lectus risus. Duis at nibh at ex viverra cursus a non diam";
        $invitation->description = "Vestibulum viverra massa id eleifend ultricies. Aenean eget tempor neque, at porttitor velit. Sed ullamcorper convallis blandit. Sed commodo urna id accumsan blandit. Ut ornare metus quis ultrices laoreet.";
        $invitation->stand_id = $stand->id;
        $invitation->save();
    }
}
