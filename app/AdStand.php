<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdStand extends Model
{
    protected $hidden = [
        "id", "stand_id"
    ];

    public function stand()
    {
        return $this->belongsTo("App\Stand");
    }
}
