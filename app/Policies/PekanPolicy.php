<?php

namespace App\Policies;

use App\User;
use App\Pekan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PekanPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Pekan $pekan)
    {
        return $user->ownsPekan($pekan);
    }

    public function delete(User $user, Pekan $pekan)
    {
        return $user->ownsPekan($pekan);
    }
}
