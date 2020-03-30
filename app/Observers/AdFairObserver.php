<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\AdFair;

class AdFairObserver
{
    public function creating(AdFair $adFair)
    {
        $adFair->uuid = (string) Str::uuid();
    }
}
