<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FairStand extends Pivot
{
    protected $hidden = [
        "stand_id", "fair_id"
    ];
}
