<?php

namespace App\Policies;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeedPolicy
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
    public function view(User $user, Feed $feed)
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
    public function update(User $user, Feed $feed)
    {
        return $user->id === $feed->herd->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Feed $feed)
    {
        return $user->id === $feed->herd->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Feed $feed)
    {
        //
    }
}
