<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\User;

class UserObserver
{
    public function creating(User $user)
    {
    	$user->uuid = (string) Str::uuid();
    }
}
