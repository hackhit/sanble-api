<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\ReviewFair;

class ReviewFairObserver
{
    public function creating(ReviewFair $reviewFair)
    {
        $reviewFair->uuid = (string) Str::uuid();
    }
}
