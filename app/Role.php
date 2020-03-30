<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "updated_at", "id", "pivot"
    ];

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
