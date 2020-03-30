<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewFair extends Model
{
    protected $hidden = [
        "id", "fair_id", "user_id"
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
