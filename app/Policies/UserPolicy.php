<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    // Current user, Target user
    public function edit(User $user, User $targetUser)
    {
        return $user->is($targetUser);
    }
}
