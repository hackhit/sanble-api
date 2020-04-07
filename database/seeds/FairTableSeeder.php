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
        $user1 = User::where("id", "=", "1")->first();
        $user2 = User::where("id", "=", "2")->first();
        $user3 = User::where("id", "=", "3")->first();

        $fair1 = new Fair();
        $fair1->name = "Adoramos la Pasta";
        $fair1->description = "Para nosotros la pasta es lo mejor que existe, y por eso hemos decidido hacer una feria en su honor para apreciarla y admirarla. Tenemos disponibles productos fabricados a base de pasta de todo tipo";
        $fair1->email = "pasta@prueba.com";
        $fair1->phone = "02951234567";
        $fair1->is_active = true;
        $fair1->type = 1;
        $fair1->location = "El Poblado, Porlamar 6301, Nueva Esparta";
        $fair1->lat = "10.9655553";
        $fair1->long = "-63.8608029";
        $fair1->user_id = $user1->id;
        $fair1->save();

        $fair2 = new Fair();
        $fair2->name = "Artesania creativa";
        $fair2->description = "En nuestra feria las personas podran dar a conocer sus habilidades para la fabricación de artesania";
        $fair2->email = "artesania@prueba.com";
        $fair2->phone = "02951234567";
        $fair2->is_active = true;
        $fair2->type = 2;
        $fair2->location = "Porlamar 6301, Nueva Esparta";
        $fair2->lat = "10.9655553";
        $fair2->long = "-63.8608029";
        $fair2->user_id = $user2->id;
        $fair2->save();

        $fair3 = new Fair();
        $fair3->name = "Mojitos Solar";
        $fair3->description = "Mojitos de bartenders profesionales, cada trago tiene su receta secreta";
        $fair3->email = "mojitos@prueba.com";
        $fair3->phone = "02951234567";
        $fair3->is_active = true;
        $fair3->type = 1;
        $fair3->location = "Pampatar 6203, Nueva Esparta";
        $fair3->lat = "10.9655553";
        $fair3->long = "-63.8608029";
        $fair3->user_id = $user3->id;
        $fair3->save();
    }
}
