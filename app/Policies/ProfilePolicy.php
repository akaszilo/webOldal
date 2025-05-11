<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;

class ProfilePolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Profile $profile): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Profile $profile): bool
    {
        return false;
    }

    public function delete(User $user, Profile $profile): bool
    {
        return false;
    }

    public function restore(User $user, Profile $profile): bool
    {
        return false;
    }

    public function forceDelete(User $user, Profile $profile): bool
    {
        return false;
    }
}
