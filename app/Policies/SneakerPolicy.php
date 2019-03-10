<?php

namespace App\Policies;

use App\User;
use App\Sneaker;
use Illuminate\Auth\Access\HandlesAuthorization;

class SneakerPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if( $user->id == 5 ) return true;
    }
    
    /**
     * Determine whether the user can update the sneakers.
     *
     * @param  \App\User  $user
     * @param  \App\Sneaker  $sneaker
     * @return mixed
     */
    public function touch(User $user, Sneaker $sneaker)
    {
        return $user->id == 5;
    }
}
