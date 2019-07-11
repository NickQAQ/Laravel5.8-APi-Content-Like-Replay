<?php

namespace App\Policies;

use App\User;
use App\Models\Topice;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any topices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the topice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Topice  $topice
     * @return mixed
     */
    public function view(User $user, Topice $topice)
    {
        return true;
    }

    /**
     * Determine whether the user can create topices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the topice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Topice  $topice
     * @return mixed
     */
    public function update(User $user, Topice $topice)
    {

        return true;
//        return $user->id === $topice->user_id;
    }

    /**
     * Determine whether the user can delete the topice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Topice  $topice
     * @return mixed
     */
    public function delete(User $user, Topice $topice)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the topice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Topice  $topice
     * @return mixed
     */
    public function restore(User $user, Topice $topice)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the topice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Topice  $topice
     * @return mixed
     */
    public function forceDelete(User $user, Topice $topice)
    {
        return true;
    }

}
