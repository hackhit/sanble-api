<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

class AppController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function test()
    {
        $result = Role::where("id", "=", 1)->with("users")->first();

        return response()->json($result);
    }
}
