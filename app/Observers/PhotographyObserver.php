<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Photography;

class PhotographyObserver
{
    public function creating(Photography $photography)
    {
        $photography->uuid = (string) Str::uuid();
    }
}
