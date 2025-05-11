<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;

class AddressPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Address $address): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Address $address): bool
    {
        return $user->id === $address->user_id;
    }

    public function delete(User $user, Address $address): bool
    {
        return $user->id === $address->user_id;
    }

    public function restore(User $user, Address $address): bool
    {
        return false;
    }

    public function forceDelete(User $user, Address $address): bool
    {
        return false;
    }
}
