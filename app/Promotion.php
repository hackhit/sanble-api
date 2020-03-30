<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $hidden = [
        "id", "stand_id"
    ];

    public function stand()
    {
        return $this->belongsTo("App\Stand");
    }


    public function items()
    {
        return $this->belongsToMany("App\Item");
    }
}
