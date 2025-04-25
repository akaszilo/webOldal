<?php

namespace App\Policies;

use App\Models\CreditCard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CreditCardPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CreditCard $creditCard): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CreditCard $creditCard): bool
    {
        return $user->id === $creditCard->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CreditCard $creditCard): bool
    {
        return $user->id === $creditCard->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CreditCard $creditCard): bool
    {
        return $user->id === $creditCard->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CreditCard $creditCard): bool
    {
        return false;
    }
}
