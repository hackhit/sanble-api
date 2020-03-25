<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Role;

class RoleObserver
{
    public function creating(Role $role)
    {
    	$role->uuid = (string) Str::uuid();
    }
}
