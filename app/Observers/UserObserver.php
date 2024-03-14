<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;
class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user)
    {
        $user->id = Str::uuid();
    }
}
