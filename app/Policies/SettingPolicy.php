<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Setting $Setting)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Setting $Setting)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Setting $Setting)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Setting $Setting)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Setting $Setting)
    {
        return $user->role === 'admin';
    }
}
