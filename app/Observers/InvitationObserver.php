<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Invitation;

class InvitationObserver
{
    public function creating(Invitation $invitation)
    {
        $invitation->uuid = (string) Str::uuid();
    }
}
