<?php

namespace App\Policies;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Announcement $Announcement)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Announcement $Announcement)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Announcement $Announcement)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Announcement $Announcement)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Announcement $Announcement)
    {
        return $user->role === 'admin';
    }
}
