<?php

namespace App\Policies;

use App\Models\Extracurricular;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtracurricularPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Extracurricular $Extracurricular)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Extracurricular $Extracurricular)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Extracurricular $Extracurricular)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Extracurricular $Extracurricular)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Extracurricular $Extracurricular)
    {
        return $user->role === 'admin';
    }
}
