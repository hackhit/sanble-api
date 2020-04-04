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

        $user = new User();
        $user->username = "prueba";
        $user->name = "Prueba Probando";
        $user->email = "prueba@prueba.com";
        $user->password = bcrypt("123123123");
        $user->save();

        $user->roles()->attach($roleBasic->id);
        $user->roles()->attach($roleStand->id);
        $user->roles()->attach($roleFair->id);
    }
}
