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
        $fair1 = Fair::where("id", "=", "1")->first();
        $fair2 = Fair::where("id", "=", "2")->first();
        $user1 = User::where("id", "=", "1")->first();
        $user2 = User::where("id", "=", "2")->first();
        $user3 = User::where("id", "=", "3")->first();

        $reviewFair1 = new ReviewFair();
        $reviewFair1->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair1->stars = 3;
        $reviewFair1->user_id = $user1->id;
        $reviewFair1->fair_id = $fair1->id;
        $reviewFair1->save();

        $reviewFair2_1 = new ReviewFair();
        $reviewFair2_1->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair2_1->stars = 4;
        $reviewFair2_1->user_id = $user1->id;
        $reviewFair2_1->fair_id = $fair2->id;
        $reviewFair2_1->save();

        $reviewFair2_2 = new ReviewFair();
        $reviewFair2_2->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair2_2->stars = 5;
        $reviewFair2_2->user_id = $user2->id;
        $reviewFair2_2->fair_id = $fair2->id;
        $reviewFair2_2->save();

        $reviewFair2_3 = new ReviewFair();
        $reviewFair2_3->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair2_3->stars = 1;
        $reviewFair2_3->user_id = $user3->id;
        $reviewFair2_3->fair_id = $fair2->id;
        $reviewFair2_3->save();
    }
}
