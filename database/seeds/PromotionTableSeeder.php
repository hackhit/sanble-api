<?php

use Illuminate\Database\Seeder;

use App\Stand;
use App\Promotion;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stand = Stand::where("id", "=", "1")->first();

        $promotion = new Promotion();
        $promotion->title = "Nunc sapien enim, iaculis a volutpat eu, vehicula dictum nunc";
        $promotion->description = " Cras sed sollicitudin odio. Sed scelerisque elit et lorem egestas, sit amet lobortis magna placerat. Donec congue enim risus, sed pellentesque magna lacinia eget.";
        $promotion->stand_id = $stand->id;
        $promotion->save();
    }
}
