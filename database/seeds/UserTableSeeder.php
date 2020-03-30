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
        $role = Role::where("name", "=", "basic")->first();

        $user = new User();
        $user->username = "prueba";
        $user->name = "Prueba Probando";
        $user->email = "prueba@prueba.com";
        $user->password = bcrypt("123123123");
        $user->save();

        $user->roles()->attach($role->id);
    }
}
