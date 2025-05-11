<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\CreditCard;
use App\Models\User;

class CreditCardPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, CreditCard $creditCard): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, CreditCard $creditCard): bool
    {
        return $user->id === $creditCard->user_id;
    }

    public function delete(User $user, CreditCard $creditCard): bool
    {
        return $user->id === $creditCard->user_id;
    }

    public function restore(User $user, CreditCard $creditCard): bool
    {
        return $user->id === $creditCard->user_id;
    }

    public function forceDelete(User $user, CreditCard $creditCard): bool
    {
        return false;
    }
}
