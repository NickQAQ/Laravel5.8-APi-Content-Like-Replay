<?php

namespace App\Policies;

use App\User;
use App\Models\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return true;
    }


    public function view(User $user, Topic $topic)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Topic $topic)
    {

        return $user->ownsTopic($topic);
    }


    public function delete(User $user, Topic $topic)
    {
        return true;
    }


    public function restore(User $user, Topic $topic)
    {
        return true;
    }


    public function forceDelete(User $user, Topic $topic)
    {
        return true;
    }
}
