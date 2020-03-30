<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Request;

class RequestObserver
{
    public function creating(Request $request)
    {
        $request->uuid = (string) Str::uuid();
    }
}
