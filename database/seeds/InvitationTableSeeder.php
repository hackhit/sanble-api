<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Fair;
use App\Invitation;

class InvitationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where("id", "=", "1")->first();
        $fair = Fair::where("id", "=", "1")->first();

        $invitation = new Invitation();
        $invitation->user_id = $user->id;
        $invitation->fair_id = $fair->id;
        $invitation->save();
    }
}
