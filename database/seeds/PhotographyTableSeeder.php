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
        $photography->cover = true;
        $photography->url_photo = "http://localhost:8000/storage/fairs/example.jpg";
        $photography->save();
    }
}
