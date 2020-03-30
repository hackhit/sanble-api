<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewStand extends Model
{
    protected $hidden = [
        "id", "stand_id", "user_id"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function stand()
    {
        return $this->belongsTo("App\Stand");
    }
}
