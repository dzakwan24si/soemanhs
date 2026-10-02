<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Event $Event)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Event $Event)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Event $Event)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Event $Event)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Event $Event)
    {
        return $user->role === 'admin';
    }
}
