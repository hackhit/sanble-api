<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Fair;

class FairTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where("id", "=", "1")->first();

        $fair = new Fair();
        $fair->name = "Adoramos la Pasta";
        $fair->description = "Para nosotros la pasta es lo mejor que existe, y por eso hemos decidido hacer una feria en su honor para apreciarla y admirarla. Tenemos disponibles productos fabricados a base de pasta de todo tipo";
        $fair->email = "pasta@prueba.com";
        $fair->phone = "02951234567";
        $fair->type = 1;
        $fair->location = "El Poblado, Porlamar 6301, Nueva Esparta";
        $fair->lat = "10.9655553";
        $fair->long = "-63.8608029";
        $fair->user_id = $user->id;
        $fair->save();
    }
}
