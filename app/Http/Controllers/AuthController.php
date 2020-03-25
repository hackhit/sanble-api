<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

use App\User;
use App\Role;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    public function signup(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:3|unique:users',
            'name' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ]);

        $role = Role::where('name', "=", 'basic')->first();

        $newUser = new User();
        $newUser->uuid = (string) Str::uuid();
        $newUser->username = $validateData['username'];
        $newUser->name = $validateData['name'];
        $newUser->email = $validateData['email'];
        $newUser->password = bcrypt($validateData['password']);
        $newUser->save();

        $newUser->roles()->attach($role->id);

        $user = User::where('id', "=", $newUser->id)->with('roles')->first();

        $for = $user->email;
        $data = [
            "name" => $user->name
        ];
        Mail::send('emails.welcome', $data, function ($msg) use ($for) {
            $msg->from("info@sanble.com.ve", "Sanble");
            $msg->subject('Bienvenido a Sanble');
            $msg->to($for);
        });

        return $user;
    }

    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('uuid', "=", auth()->user()->uuid)->with('roles')->first();

        $response = [
            "data" => $user,
            "meta" => $this->respondWithToken($token)->original
        ];

        return response()->json($response);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
