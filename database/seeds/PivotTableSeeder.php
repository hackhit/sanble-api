<?php

use Illuminate\Database\Seeder;

use App\Fair;
use App\Stand;
use App\FairStand;
use App\User;
use App\Promotion;
use App\Item;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stand = Stand::where("id", "=", 1)->first();
        $fair = Fair::where("id", "=", 1)->first();
        $user = User::where("id", "=", "1")->first();
        $promotion = Promotion::where("id", "=", 1)->first();
        $item = Item::where("id", "=", "1")->first();

        $fairStand = new FairStand;
        $fairStand->location = "Parte izquerda de la feria, junto a la tarima";
        $fairStand->lat = "10.9655553";
        $fairStand->long = "-63.8608029";
        $fairStand->fair_id = $fair->id;
        $fairStand->stand_id = $stand->id;
        $fairStand->save();

        $user->favorite_fairs()->attach($fair->id);
        $user->favorite_stands()->attach($stand->id);
        $user->save();

        $promotion->items()->attach($item->id);
        $promotion->save();
    }
}
