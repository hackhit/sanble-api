<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Stand;

class StandObserver
{

    public function creating(Stand $stand)
    {
        $stand->uuid = (string) Str::uuid();
    }
}
