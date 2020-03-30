<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\AdStand;

class AdStandObserver
{
    public function creating(AdStand $adStand)
    {
        $adStand->uuid = (string) Str::uuid();
    }
}
