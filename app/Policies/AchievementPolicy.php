<?php

namespace App\Policies;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Achievement $Achievement)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Achievement $Achievement)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Achievement $Achievement)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Achievement $Achievement)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Achievement $Achievement)
    {
        return $user->role === 'admin';
    }
}
