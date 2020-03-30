<?php

use Illuminate\Database\Seeder;

use App\Stand;
use App\Item;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stand = Stand::where("id", "=", "1")->first();

        $item = new Item();
        $item->name = "Bizcocho mágico";
        $item->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo tortor, a efficitur felis. Donec at nisl gravida, vestibulum purus eget, accumsan nibh. Cras ultrices eros non risus dignissim convallis.";
        $item->url_photo = "/storage/stands/items/example.jpeg";
        $item->price = 1234.56;
        $item->stand_id = $stand->id;
        $item->save();
    }
}
