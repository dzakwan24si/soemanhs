<?php

namespace App\Policies;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Gallery $Gallery)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Gallery $Gallery)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Gallery $Gallery)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Gallery $Gallery)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Gallery $Gallery)
    {
        return $user->role === 'admin';
    }
}
