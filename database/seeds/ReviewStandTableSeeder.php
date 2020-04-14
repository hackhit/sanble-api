<?php

use Illuminate\Database\Seeder;

use App\Stand;
use App\User;
use App\ReviewStand;

class ReviewStandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stand = Stand::where("id", "=", "1")->first();
        $user = User::where("id", "=", "1")->first();

        $reviewStand = new ReviewStand();
        $reviewStand->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewStand->stars = 4;
        $reviewStand->user_id = $user->id;
        $reviewStand->stand_id = $stand->id;
        $reviewStand->save();
    }
}
