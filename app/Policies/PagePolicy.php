<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Page $Page)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Page $Page)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Page $Page)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Page $Page)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Page $Page)
    {
        return $user->role === 'admin';
    }
}
