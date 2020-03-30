<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Fair;

class FairObserver
{

    public function creating(Fair $fair)
    {
        $fair->uuid = (string) Str::uuid();
    }
}
