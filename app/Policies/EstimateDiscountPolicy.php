<?php

namespace App\Policies;

use App\Models\EstimateDiscount;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EstimateDiscountPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EstimateDiscount $estimateDiscount): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EstimateDiscount $estimateDiscount): bool
    {
        if ($estimateDiscount->trashed() && !$user->is_admin) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EstimateDiscount $estimateDiscount): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EstimateDiscount $estimateDiscount): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EstimateDiscount $estimateDiscount): bool
    {
        return $user->is_admin;
    }
}
