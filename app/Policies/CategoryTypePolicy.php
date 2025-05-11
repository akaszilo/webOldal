<?php

namespace App\Policies;

use App\Models\Category_type;
use App\Models\User;

class CategoryTypePolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Category_type $categoryType): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Category_type $categoryType): bool
    {
        return false;
    }

    public function delete(User $user, Category_type $categoryType): bool
    {
        return false;
    }

    public function restore(User $user, Category_type $categoryType): bool
    {
        return false;
    }

    public function forceDelete(User $user, Category_type $categoryType): bool
    {
        return false;
    }
}
