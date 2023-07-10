<?php

namespace App\Policies;

use App\Models\Cattle;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CattlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Cattle $cattle): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cattle $cattle): bool
    {
        return $user->id === $cattle->herd->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cattle $cattle): bool
    {
        return $user->id === $cattle->herd->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cattle $cattle): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cattle $cattle): bool
    {
        //
    }
}
