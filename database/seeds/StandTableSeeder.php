<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Stand;

class StandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where("id", "=", "1")->first();

        $stand = new Stand();
        $stand->name = 'Azuquita y Sal';
        $stand->slogan = "Nam nec metus aliquam, tincidunt quam et, tempus leo";
        $stand->description = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam, architecto error. Voluptatem voluptates dolorem inventore tempore animi numquam ipsa. Animi reiciendis tempore quia enim voluptatum similique qui assumenda inventore blanditiis!";
        $stand->url_photo = "/storage/stands/photo/example.jpg";
        $stand->stars = 4;
        $stand->user_id = $user->id;
        $stand->save();
    }
}
