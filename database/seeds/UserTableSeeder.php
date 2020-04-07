<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleBasic = Role::where("name", "=", "basic")->first();
        $roleStand = Role::where("name", "=", "stand")->first();
        $roleFair = Role::where("name", "=", "fair")->first();

        $master = new User();
        $master->username = "master";
        $master->name = "Usuario Maestro";
        $master->email = "master@prueba.com";
        $master->password = bcrypt("123123123");
        $master->save();
        $master->roles()->attach($roleBasic->id);
        $master->roles()->attach($roleStand->id);
        $master->roles()->attach($roleFair->id);

        $basic = new User();
        $basic->username = "basic";
        $basic->name = "Usuario Básico";
        $basic->email = "basic@prueba.com";
        $basic->password = bcrypt("123123123");
        $basic->save();
        $basic->roles()->attach($roleBasic->id);

        $stand = new User();
        $stand->username = "stand";
        $stand->name = "Usuario Stand";
        $stand->email = "stand@prueba.com";
        $stand->password = bcrypt("123123123");
        $stand->save();
        $stand->roles()->attach($roleBasic->id);
        $stand->roles()->attach($roleStand->id);

        $fair = new User();
        $fair->username = "fair";
        $fair->name = "Usuario Feria";
        $fair->email = "fair@prueba.com";
        $fair->password = bcrypt("123123123");
        $fair->save();
        $fair->roles()->attach($roleBasic->id);
        $fair->roles()->attach($roleFair->id);
    }
}
