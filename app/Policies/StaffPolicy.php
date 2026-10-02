<?php

namespace App\Policies;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Staff $Staff)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Staff $Staff)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Staff $Staff)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Staff $Staff)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Staff $Staff)
    {
        return $user->role === 'admin';
    }
}
