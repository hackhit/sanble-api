<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\ReviewStand;

class ReviewStandObserver
{
    public function creating(ReviewStand $reviewStand)
    {
        $reviewStand->uuid = (string) Str::uuid();
    }
}
