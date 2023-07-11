<?php

namespace App\Policies;

use App\Models\Health;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HealthPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Health $health)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Health $health)
    {
        return $user->id === $health->cattle->herd->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Health $health)
    {
        return $user->id === $health->cattle->herd->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Health $health)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Health $health)
    {
        //
    }
}
