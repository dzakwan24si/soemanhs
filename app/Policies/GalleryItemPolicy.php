<?php

namespace App\Policies;

use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryItemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, GalleryItem $GalleryItem)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, GalleryItem $GalleryItem)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, GalleryItem $GalleryItem)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, GalleryItem $GalleryItem)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, GalleryItem $GalleryItem)
    {
        return $user->role === 'admin';
    }
}
