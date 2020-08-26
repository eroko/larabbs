<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function action(User $user)
    {
        //
    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
