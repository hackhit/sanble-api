<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Promotion;

class PromotionObserver
{
    public function creating(Promotion $promotion)
    {
        $promotion->uuid = (string) Str::uuid();
    }
}
