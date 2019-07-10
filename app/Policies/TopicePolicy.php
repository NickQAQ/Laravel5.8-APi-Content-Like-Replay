<?php

namespace App\Policies;

use App\User;
use App\Models\Topice;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicePolicy
{
    use HandlesAuthorization;
    

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Topice $topice)
    {

    }


    public function create(User $user)
    {
        //任何用户都可以创建话题
        return true;
    }


    public function update(User $user, Topice $topice)
    {
        return $user->ownTopic($topice);
    }


    public function delete(User $user, Topice $topice)
    {
        //
    }


    public function restore(User $user, Topice $topice)
    {
        //
    }


    public function forceDelete(User $user, Topice $topice)
    {
        //
    }
}
