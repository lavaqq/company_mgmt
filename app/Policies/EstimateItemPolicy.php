<?php

namespace App\Policies;

use App\Models\EstimateItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EstimateItemPolicy
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
    public function view(User $user, EstimateItem $estimateItem): bool
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
    public function update(User $user, EstimateItem $estimateItem): bool
    {
        if ($estimateItem->trashed() && !$user->is_admin) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EstimateItem $estimateItem): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EstimateItem $estimateItem): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EstimateItem $estimateItem): bool
    {
        return $user->is_admin;
    }
}
