<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $hidden = [
        "id", "user_id"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function items()
    {
        return $this->hasMany("App\ItemStand");
    }

    public function fairs()
    {
        return $this->belongsToMany("App\Fair", "fair_stand")->using('App\FairStand')->withPivot([
            'location', 'lat', 'long',
        ]);
    }

    public function reviews()
    {
        return $this->hasMany("App\ReviewStand");
    }
}
