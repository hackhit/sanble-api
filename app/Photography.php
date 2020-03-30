<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    protected $hidden = [
        "id", "fair_id"
    ];

    public function fair()
    {
        return $this->belongsTo("App\Fair");
    }
}
