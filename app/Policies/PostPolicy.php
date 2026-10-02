<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Post $Post)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Post $Post)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Post $Post)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Post $Post)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Post $Post)
    {
        return $user->role === 'admin';
    }
}
