<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Item;

class ItemObserver
{
    public function creating(Item $item)
    {
        $item->uuid = (string) Str::uuid();
    }
}
