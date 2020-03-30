<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        "name", "email", "password",
    ];

    protected $hidden = [
        "password", "remember_token", "id", "pivot"
    ];

    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function username()
    {
        return "username";
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles()
    {
        return $this->belongsToMany("App\Role");
    }

    public function fairs()
    {
        return $this->hasMany("App\Fair");
    }

    public function favorite_fairs()
    {
        return $this->belongsToMany("App\Fair", "favorite_user_fair");
    }

    public function favorite_stands()
    {
        return $this->belongsToMany("App\Stand", "favorite_user_stand");
    }
}
