<?php

namespace App\Policies;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function view(User $user, Testimonial $Testimonial)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function update(User $user, Testimonial $Testimonial)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function delete(User $user, Testimonial $Testimonial)
    {
        return in_array($user->role, ['admin', 'operator']);
    }

    public function restore(User $user, Testimonial $Testimonial)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Testimonial $Testimonial)
    {
        return $user->role === 'admin';
    }
}
