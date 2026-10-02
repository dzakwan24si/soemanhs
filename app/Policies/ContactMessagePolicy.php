<?php

namespace App\Policies;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactMessagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, ContactMessage $ContactMessage)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, ContactMessage $ContactMessage)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, ContactMessage $ContactMessage)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, ContactMessage $ContactMessage)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, ContactMessage $ContactMessage)
    {
        return $user->role === 'admin';
    }
}
