<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $hidden = [
        "id", "user_id", "fair_id"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function fair()
    {
        return $this->belongsTo("App\Fair");
    }
}
