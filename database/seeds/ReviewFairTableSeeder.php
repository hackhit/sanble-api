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
        $reviewFair1->start = 3;
        $reviewFair1->user_id = $user1->id;
        $reviewFair1->fair_id = $fair1->id;
        $reviewFair1->save();

        $reviewFair2 = new ReviewFair();
        $reviewFair2->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair2->start = 4;
        $reviewFair2->user_id = $user1->id;
        $reviewFair2->fair_id = $fair2->id;
        $reviewFair2->save();

        $reviewFair3 = new ReviewFair();
        $reviewFair3->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair3->start = 5;
        $reviewFair3->user_id = $user2->id;
        $reviewFair3->fair_id = $fair2->id;
        $reviewFair3->save();

        $reviewFair4 = new ReviewFair();
        $reviewFair4->comment = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis.";
        $reviewFair4->start = 1;
        $reviewFair4->user_id = $user3->id;
        $reviewFair4->fair_id = $fair2->id;
        $reviewFair4->save();
    }
}
