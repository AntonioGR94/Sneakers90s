<?php

namespace App\Policies;

use App\User;
use App\Brand;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if( $user->id == 3 ) return true;
    }
    
    /**
     * Determine whether the user can update the sneakers.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function touch(User $user, Brand $brand)
    {
        return $brand->user_id == $user->id || $user->id == 3;
    }
}
