<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $hidden = [
        "id", "stand_id"
    ];

    public function stand()
    {
        return $this->belongsTo("App\Stand");
    }

    public function promotions()
    {
        return $this->belongsToMany("App\Promotion");
    }
}
