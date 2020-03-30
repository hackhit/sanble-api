<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fair extends Model
{
    protected $hidden = [
        "id", "user_id"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }


    public function photographies()
    {
        return $this->hasMany("App\Photography");
    }

    public function stands()
    {
        return $this->belongsToMany("App\Stand", "fair_stand")->using('App\FairStand')->withPivot([
            'location', 'lat', 'long',
        ]);
    }
}
