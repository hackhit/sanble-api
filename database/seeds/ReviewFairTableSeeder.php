<?php

use Illuminate\Database\Seeder;

use App\Fair;
use App\User;
use App\ReviewFair;

class ReviewFairTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fair = Fair::where("id", "=", "1")->first();
        $user = User::where("id", "=", "1")->first();

        $reviewFair = new ReviewFair();
        $reviewFair->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair->start = 3;
        $reviewFair->user_id = $user->id;
        $reviewFair->fair_id = $fair->id;
        $reviewFair->save();
    }
}
