<?php

use Illuminate\Database\Seeder;

use App\Fair;
use App\Photography;

class PhotographyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fair = Fair::where("id", "=", "1")->first();

        $photography = new Photography();
        $photography->fair_id = $fair->id;
        $photography->url_photo = "/storage/fairs/example.jpg";
        $photography->save();
    }
}
