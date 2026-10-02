<?php

namespace App\Policies;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacilityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Facility $Facility)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Facility $Facility)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Facility $Facility)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Facility $Facility)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Facility $Facility)
    {
        return $user->role === 'admin';
    }
}
