<?php

namespace App\Policies;

use App\Models\Download;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DownloadPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Download $Download)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Download $Download)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Download $Download)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Download $Download)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Download $Download)
    {
        return $user->role === 'admin';
    }
}
