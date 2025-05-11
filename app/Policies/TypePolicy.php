<?php

namespace App\Policies;

use App\Models\Type;
use App\Models\User;

class TypePolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Type $type): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Type $type): bool
    {
        return false;
    }

    public function delete(User $user, Type $type): bool
    {
        return false;
    }

    public function restore(User $user, Type $type): bool
    {
        return false;
    }

    public function forceDelete(User $user, Type $type): bool
    {
        return false;
    }
}
