<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Category $Category)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Category $Category)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Category $Category)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Category $Category)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Category $Category)
    {
        return $user->role === 'admin';
    }
}
